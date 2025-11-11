<?php

namespace App\Http\Middleware;

use App\Jobs\RecordVisit;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TrackVisit
{
    /**
     * Chemins à exclure du tracking (requêtes API internes)
     */
    protected $excludedPaths = [
        'admin/api/*',
        'api/*',
        'livewire/*',
        '_debugbar/*',
        'telescope/*',
        'horizon/*',
        // Routes API internes (stats, listes, etc.)
        'admin/*/stats',
        'admin/*/by-day',
        'admin/*/by-hour',
        'admin/*/top-pages',
        'admin/*/device-stats',
        'admin/*/recent',
        'admin/notifications/mark-all-read',
        'admin/categories/list',
        'rss', // RSS feed
    ];

    /**
     * Extensions de fichiers à ignorer
     */
    protected $excludedExtensions = [
        'js', 'css', 'map', 'json', 'xml', 'txt',
        'ico', 'png', 'jpg', 'jpeg', 'gif', 'svg', 'webp',
        'woff', 'woff2', 'ttf', 'eot',
    ];

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Ne tracker que les requêtes GET réussies ET non-AJAX
        if ($request->isMethod('GET') && 
            $response->isSuccessful() && 
            !$request->ajax() && 
            !$request->wantsJson()) {
            
            // Vérifier si le chemin doit être exclu
            if (!$this->shouldTrack($request)) {
                return $response;
            }

            // Normaliser l'URL pour ne garder que la page principale
            $normalizedUrl = $this->normalizeUrl($request->path());

            // Exécuter le job de manière synchrone (pas de queue worker nécessaire en prod)
            RecordVisit::dispatchSync([
                'user_id' => Auth::id(),
                'url' => $normalizedUrl,
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'referrer' => $request->header('referer'),
                'visited_at' => now(),
            ]);
        }

        return $response;
    }

    /**
     * Déterminer si la requête doit être trackée
     */
    protected function shouldTrack(Request $request): bool
    {
        $path = $request->path();

        // Exclure certains chemins
        foreach ($this->excludedPaths as $excludedPath) {
            if (fnmatch($excludedPath, $path)) {
                return false;
            }
        }

        // Exclure les fichiers statiques
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        if (in_array($extension, $this->excludedExtensions)) {
            return false;
        }

        return true;
    }

    /**
     * Normaliser l'URL pour ne garder que la page principale
     * Exemple: admin/formations/1/edit -> admin/formations/{id}/edit
     *          admin/visits/stats -> admin/visits
     */
    protected function normalizeUrl(string $url): string
    {
        // Remplacer les IDs numériques par {id}
        $url = preg_replace('/\/\d+/', '/{id}', $url);

        // Pour les URLs avec des sous-routes API, garder seulement la base
        // Exemples:
        // - admin/visits/stats -> admin/visits
        // - admin/formations/1/details-page -> admin/formations/{id}/details-page
        
        return $url;
    }
}
