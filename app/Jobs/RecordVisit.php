<?php

namespace App\Jobs;

use App\Models\Visit;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Jenssegers\Agent\Agent;

class RecordVisit implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $visitData;

    /**
     * Create a new job instance.
     */
    public function __construct(array $visitData)
    {
        $this->visitData = $visitData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            // Parser le user agent pour extraire device, browser, platform
            $agent = new Agent();
            $agent->setUserAgent($this->visitData['user_agent'] ?? '');

            $device = $agent->isDesktop() ? 'desktop' : ($agent->isTablet() ? 'tablet' : 'mobile');
            $browser = $agent->browser();
            $platform = $agent->platform();

            Visit::create([
                'user_id' => $this->visitData['user_id'] ?? null,
                'url' => $this->visitData['url'],
                'ip' => $this->visitData['ip'],
                'user_agent' => $this->visitData['user_agent'],
                'referrer' => $this->visitData['referrer'] ?? null,
                'device' => $device,
                'browser' => $browser,
                'platform' => $platform,
                'country' => $this->visitData['country'] ?? null,
                'visited_at' => $this->visitData['visited_at'],
            ]);

        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'enregistrement de la visite:', [
                'error' => $e->getMessage(),
                'data' => $this->visitData,
            ]);
        }
    }
}
