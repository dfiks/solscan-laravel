<?php

namespace DFiks\Solscan\Providers;

use DFiks\Solscan\Core\Requests\SolscanRequest;
use DFiks\Solscan\Core\SolscanCore;
use Illuminate\Support\ServiceProvider;

class SolscanServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../../config/solscan.php' => config_path('solscan.php'),
        ], 'config');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/solscan.php',
            'solscan'
        );

        $this->app->singleton('solscan', function () {
            return app(SolscanCore::class);
        });

        $this->app->bind(SolscanRequest::class, function ($app) {
            return new SolscanRequest;
        });
    }
}
