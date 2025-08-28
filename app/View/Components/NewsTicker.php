<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Services\RssService;

class NewsTicker extends Component
{
    /**
     * Create a new component instance.
     */
    public $actualites;

    public function __construct($url = 'https://rss.nytimes.com/services/xml/rss/nyt/World.xml', $limit = 10)
    {
        // Récupère les actualités via le service RSS
        $this->actualites = RssService::getFeed($url, $limit);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.news-ticker');
    }
}
