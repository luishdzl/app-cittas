<?php

namespace Vendor\Quotes\Http\Controllers;

use Vendor\Quotes\Services\QuoteClient;

class QuoteController
{
    protected $client;

    public function __construct(QuoteClient $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        return response()->json($this->client->getAllQuotes());
    }

    public function show($id)
    {
        return response()->json($this->client->getQuote($id));
    }

    public function random()
    {
        $quotes = $this->client->getAllQuotes();
        return response()->json($quotes[array_rand($quotes)]);
    }
}