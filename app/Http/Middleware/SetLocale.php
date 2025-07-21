<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // Priorité à la session, sinon langue par défaut
        $locale = Session::get('locale') ?? 'fr'; // Remplacez 'fr' par la langue par défaut de votre application
        Session::put('locale', $locale); // Assurez-vous que la session est mise à jour
        // Définir la locale de l'application 
        App::setLocale($locale);

        return $next($request);
        
    }
}
