<?php

namespace Vendor\Quotes\Providers;

use Illuminate\Support\ServiceProvider;

class QuotesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/quotes.php', 'quotes');
        $this->app->singleton('quote-client', \Vendor\Quotes\Services\QuoteClient::class);
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/api.php');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'quotes');

        $this->publishes([
            __DIR__.'/../../config/quotes.php' => config_path('quotes.php'),
            __DIR__.'/../../resources/js' => resource_path('js/vendor/quotes'),
        ], 'quotes-assets');
    }
}