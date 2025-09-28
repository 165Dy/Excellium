<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Log pour débugger
        Log::info('AdminAuth middleware triggered for: ' . $request->url());
        
        // Vérifier si l'utilisateur est connecté
        if (!Auth::check()) {
            Log::info('User not authenticated, redirecting to login');
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour accéder à cette page.');
        }

        // Vérifier si l'utilisateur a les droits admin
        $user = Auth::user();
        Log::info('User authenticated: ' . $user->email . ' - Type: ' . $user->type);
        
        if (!in_array($user->type, ['admin', 'super_admin'])) {
            Log::info('User not admin, logging out');
            Auth::logout();
            return redirect()->route('login')->with('error', 'Accès non autorisé. Vous devez être administrateur.');
        }

        return $next($request);
    }
}
