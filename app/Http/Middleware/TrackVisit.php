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
     * Chemins à exclure du tracking
     */
    protected $excludedPaths = [
        'admin/api/*',
        'api/*',
        'livewire/*',
        '_debugbar/*',
        'telescope/*',
        'horizon/*',
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

        // Ne tracker que les requêtes GET réussies
        if ($request->isMethod('GET') && $response->isSuccessful()) {
            // Vérifier si le chemin doit être exclu
            if (!$this->shouldTrack($request)) {
                return $response;
            }

            // Dispatcher le job en queue pour ne pas ralentir la requête
            RecordVisit::dispatch([
                'user_id' => Auth::id(),
                'url' => $request->path(),
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
}
