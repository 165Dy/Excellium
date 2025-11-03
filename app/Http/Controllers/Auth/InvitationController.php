<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\AdminInvitation;
use Mailgun\Mailgun;

class InvitationController extends Controller
{
    // Le middleware est appliqué dans les routes (routes/web.php)

    /**
     * Afficher la liste des invitations
     */
    public function index()
    {
        // Vérifier si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté.');
        }

        // Seuls les super_admin peuvent voir les invitations
        if (Auth::user()->type !== 'super_admin') {
            abort(403, 'Accès non autorisé. Seuls les super administrateurs peuvent gérer les invitations.');
        }

        $invitations = AdminInvitation::with('invitedBy')
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->get();

        return view('Admin.invitations.list', compact('invitations'));
    }

    /**
     * Envoyer une invitation à un nouvel administrateur
     */
    public function sendInvitation(Request $request)
    {
        // Seuls les super_admin peuvent envoyer des invitations
        if (Auth::user()->type !== 'super_admin') {
            abort(403, 'Accès non autorisé.');
        }

        $request->validate([
            'email' => 'required|email|unique:users,email',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'type' => 'required|in:admin,super_admin',
        ]);

        // Vérifier s'il y a déjà une invitation en cours pour cet email
        $existingInvitation = AdminInvitation::where('email', $request->email)
            ->where('expires_at', '>', now())
            ->where('used_at', null)
            ->first();

        if ($existingInvitation) {
            return back()->with('error', 'Une invitation est déjà en cours pour cette adresse email.');
        }

        // Créer un token qui encode le type d'utilisateur
        $baseToken = Str::random(60);
        $typePrefix = $request->type === 'super_admin' ? 'SA' : 'AD';
        $token = $typePrefix . $baseToken;
        $expiresAt = now()->addDays(7); // L'invitation expire dans 7 jours

        // Enregistrer l'invitation
        AdminInvitation::insert([
            'email' => $request->email,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'token' => $token,
            'invited_by' => Auth::id(),
            'expires_at' => $expiresAt,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Envoyer l'email d'invitation
        $invitationUrl = route('register', ['token' => $token]);
        
        // Envoi de l'email d'invitation via Mailgun
        try {
            $mailgunSecret = config('services.mailgun.secret');
            $mailgunDomain = config('services.mailgun.domain');
            $mailgunEndpoint = config('services.mailgun.endpoint', 'api.eu.mailgun.net');
            
            if (!empty($mailgunSecret) && !empty($mailgunDomain)) {
                $variables = [
                    'admin_name' => $request->prenom . ' ' . $request->nom,
                    'invitation_link' => $invitationUrl,
                ];
                
                $mg = Mailgun::create($mailgunSecret, 'https://' . $mailgunEndpoint);
                $mg->messages()->send($mailgunDomain, [
                    'from' => 'Excellium Conseils <contact@excelliumconseils.com>',
                    'to' => $request->email,
                    'subject' => 'Invitation à rejoindre l\'administration - Excellium Conseils',
                    'template' => 'excellium_invitation_admin',
                    'h:X-Mailgun-Variables' => json_encode($variables),
                ]);
                
                Log::info("Email d'invitation envoyé à: {$request->email}");
            } else {
                Log::warning("Configuration Mailgun manquante - Email d'invitation non envoyé");
            }
        } catch (\Exception $e) {
            Log::error("Erreur envoi email invitation: " . $e->getMessage());
            // L'invitation reste enregistrée même si l'email échoue
        }

        return back()->with('success', 'Invitation envoyée avec succès à ' . $request->email);
    }

    /**
     * Révoquer une invitation
     */
    public function revokeInvitation($id)
    {
        // Seuls les super_admin peuvent révoquer des invitations
        if (Auth::user()->type !== 'super_admin') {
            abort(403, 'Accès non autorisé.');
        }

        $invitation = AdminInvitation::where('id', $id)
            ->where('used_at', null)
            ->first();

        if (!$invitation) {
            return back()->with('error', 'Invitation non trouvée ou déjà utilisée.');
        }

        AdminInvitation::where('id', $id)
            ->update(['used_at' => now()]);

        return back()->with('success', 'Invitation révoquée avec succès.');
    }

    /**
     * Renvoyer une invitation
     */
    public function resendInvitation($id)
    {
        // Seuls les super_admin peuvent renvoyer des invitations
        if (Auth::user()->type !== 'super_admin') {
            abort(403, 'Accès non autorisé.');
        }

        $invitation = AdminInvitation::where('id', $id)
            ->where('used_at', null)
            ->first();

        if (!$invitation) {
            return back()->with('error', 'Invitation non trouvée ou déjà utilisée.');
        }

        // Générer un nouveau token en conservant le type d'origine
        $oldToken = $invitation->token;
        $typePrefix = substr($oldToken, 0, 2); // Récupérer le préfixe (SA ou AD)
        $baseToken = Str::random(60);
        $newToken = $typePrefix . $baseToken;
        $newExpiresAt = now()->addDays(7);

        AdminInvitation::where('id', $id)
            ->update([
                'token' => $newToken,
                'expires_at' => $newExpiresAt,
                'updated_at' => now(),
            ]);

        // Envoyer le nouvel email d'invitation
        $invitationUrl = route('register', ['token' => $newToken]);
        
        // Envoi de l'email d'invitation via Mailgun
        try {
            $mailgunSecret = config('services.mailgun.secret');
            $mailgunDomain = config('services.mailgun.domain');
            $mailgunEndpoint = config('services.mailgun.endpoint', 'api.eu.mailgun.net');
            
            if (!empty($mailgunSecret) && !empty($mailgunDomain)) {
                $variables = [
                    'admin_name' => $invitation->prenom . ' ' . $invitation->nom,
                    'invitation_link' => $invitationUrl,
                ];
                
                $mg = Mailgun::create($mailgunSecret, 'https://' . $mailgunEndpoint);
                $mg->messages()->send($mailgunDomain, [
                    'from' => 'Excellium Conseils <contact@excelliumconseils.com>',
                    'to' => $invitation->email,
                    'subject' => 'Nouvelle invitation à rejoindre l\'administration - Excellium Conseils',
                    'template' => 'excellium_invitation_admin',
                    'h:X-Mailgun-Variables' => json_encode($variables),
                ]);
                
                Log::info("Email d'invitation (renvoi) envoyé à: {$invitation->email}");
            } else {
                Log::warning("Configuration Mailgun manquante - Email d'invitation (renvoi) non envoyé");
            }
        } catch (\Exception $e) {
            Log::error("Erreur envoi email invitation (renvoi): " . $e->getMessage());
            // L'invitation reste mise à jour même si l'email échoue
        }

        return back()->with('success', 'Invitation renvoyée avec succès.');
    }
}
