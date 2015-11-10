<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\GoogleKeywordScraper;

class GoogleKeywordScrapperProvider extends ServiceProvider {

    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {

        $this->app->bind('App\Interfaces\ScraperInterface', function() {
            return new GoogleKeywordScraper();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return ['App\Interfaces\ScraperInterface'];
    }

}
