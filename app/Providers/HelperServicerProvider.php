<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServicerProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->loadHelpers();
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
    }

    /**
     * Undocumented function.
     */
    protected function loadHelpers()
    {
        foreach (glob(__DIR__.'/../Helpers/*.php') as $filename) {
            require_once $filename;
        }
    }
}
