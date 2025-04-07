<?php

namespace Vendor\Quotes\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class QuoteClient
{
    protected $config;
    protected $cacheKey = 'quotes_cache';

    public function __construct()
    {
        $this->config = config('quotes');
    }

    public function getAllQuotes()
    {
        $this->checkRateLimit();
        $response = Http::get($this->config['api_url'].'/quotes');
        return $response->json()['quotes'];
    }

    public function getQuote(int $id)
    {
        $cached = Cache::get($this->cacheKey, []);
        $quote = $this->binarySearch($cached, $id);
        
        if (!$quote) {
            $this->checkRateLimit();
            $response = Http::get($this->config['api_url']."/quotes/{$id}");
            $quote = $response->json();
            $this->updateCache($quote);
        }
        
        return $quote;
    }

    private function checkRateLimit()
    {
        // Implementar lógica de limitación de tasa
    }

    private function binarySearch(array $quotes, int $id)
    {
        // Implementar búsqueda binaria
    }

    private function updateCache(array $quote)
    {
        // Actualizar caché manteniendo el orden
    }
}