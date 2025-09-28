<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AdminInvitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Mailgun\Mailgun;

class AuthController extends Controller
{
    /**
     * Afficher la page de connexion
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Traitement de la connexion
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            
            $user = Auth::user();
            
            // Vérifier que l'utilisateur est admin ou super_admin
            if (!in_array($user->type, ['admin', 'super_admin'])) {
                Auth::logout();
                return back()->with('error', 'Accès non autorisé. Seuls les administrateurs peuvent se connecter.');
            }
            
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->with('error', 'Email ou mot de passe incorrect.');
    }

    /**
     * Déconnexion
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login')->with('success', 'Vous avez été déconnecté avec succès.');
    }

    /**
     * Afficher la page d'inscription (uniquement avec invitation)
     */
    public function showRegisterForm(Request $request)
    {
        $token = $request->query('token');
        
        if (!$token) {
            return redirect()->route('login')->with('error', 'Token d\'invitation manquant.');
        }

        // Vérifier que le token existe et n'est pas expiré
        $invitation = AdminInvitation::where('token', $token)
            ->where('token', $token)
            ->where('expires_at', '>', now())
            ->where('used_at', null)
            ->first();

        if (!$invitation) {
            return redirect()->route('login')->with('error', 'Token d\'invitation invalide ou expiré.');
        }

        return view('auth.register', compact('token', 'invitation'));
    }

    /**
     * Traitement de l'inscription
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'telephone' => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Vérifier le token d'invitation
        $invitation = AdminInvitation::where('token', $request->token)
            ->where('token', $request->token)
            ->where('expires_at', '>', now())
            ->where('used_at', null)
            ->first();

        if (!$invitation) {
            return back()->with('error', 'Token d\'invitation invalide ou expiré.');
        }

        // Déterminer le type d'utilisateur à partir du token
        $tokenPrefix = substr($invitation->token, 0, 2);
        $userType = $tokenPrefix === 'SA' ? 'super_admin' : 'admin';
        
        // Créer l'utilisateur
        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password),
            'type' => $userType,
            'email_verified_at' => now(),
        ]);

        // Marquer l'invitation comme utilisée
        AdminInvitation::where('id', $invitation->id)
            ->where('id', $invitation->id)
            ->update(['used_at' => now()]);

        // Connecter l'utilisateur
        Auth::login($user);

        return redirect()->route('admin.dashboard')->with('success', 'Compte créé avec succès. Bienvenue !');
    }

    /**
     * Afficher la page de mot de passe oublié
     */
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * Envoyer le lien de réinitialisation de mot de passe
     */
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)
                    ->whereIn('type', ['admin', 'super_admin'])
                    ->first();

        if (!$user) {
            return back()->with('error', 'Aucun administrateur trouvé avec cette adresse email.');
        }

        $token = Str::random(64);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => Hash::make($token),
                'created_at' => now()
            ]
        );

        // Envoi de l'email de réinitialisation via Mailgun
        $resetUrl = route('password.reset', ['token' => $token]);
        $mg = Mailgun::create(env('MAILGUN_SECRET'), 'https://api.eu.mailgun.net');
        $variables = [
            'reset_link' => $resetUrl,
            'token' => $token,
        ];
        
        $mg->messages()->send(env('MAILGUN_DOMAIN'), [
            'from' => 'Excellium Conseils <contact@excelliumconseils.com>',
            'to' => $request->email,
            'subject' => 'Réinitialisation de votre mot de passe - Excellium Conseils',
            'template' => 'Excellium_réinitialisation_mdp',
            'h:X-Mailgun-Variables' => json_encode($variables),
        ]);

        return back()->with('success', 'Lien de réinitialisation envoyé par email.');
    }

    /**
     * Afficher la page de réinitialisation de mot de passe
     */
    public function showResetPasswordForm(Request $request)
    {
        $token = $request->route('token');
        $email = $request->query('email');

        return view('auth.reset-password', compact('token', 'email'));
    }

    /**
     * Réinitialiser le mot de passe
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $passwordReset = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();

        if (!$passwordReset || !Hash::check($request->token, $passwordReset->token)) {
            return back()->with('error', 'Token de réinitialisation invalide.');
        }

        $user = User::where('email', $request->email)
            ->whereIn('type', ['admin', 'super_admin'])
            ->first();

        if (!$user) {
            return back()->with('error', 'Utilisateur non trouvé.');
        }

        $user->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('success', 'Mot de passe réinitialisé avec succès.');
    }
}
