<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\OddsConverterService;
use Illuminate\Support\Facades\Log;

class OddsConverterServiceProvider extends ServiceProvider {

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
        $this->app->bind('App\Interfaces\OddsConterterInterface', function () {
            try {
                return new OddsConverterService();
            } catch (\Exception $e) {
                Log::error($e);
            }
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return ['App\Interfaces\OddsConterterInterface'];
    }


}
