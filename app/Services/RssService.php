<?php

namespace App\Services;

use GuzzleHttp\Client;

class RssService
{
    public static function getFeed($url, $limit = 10)
    {
        $client = new Client();
        try {
            $response = $client->get($url);
            $content = $response->getBody()->getContents();

            $rss = simplexml_load_string($content);
            $items = [];

            if ($rss && isset($rss->channel->item)) {
                foreach ($rss->channel->item as $index => $item) {
                    if ($index >= $limit) break;
                    $items[] = [
                        'titre' => (string) $item->title,
                        'lien'  => (string) $item->link,
                        'date'  => (string) $item->pubDate,
                    ];
                }
            }

            return $items;
        } catch (\Exception $e) {
            return []; // retourne un tableau vide en cas d'erreur
        }
    }
}
