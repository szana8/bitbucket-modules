<?php
namespace LaravelIssueTracker\Core;

use Illuminate\Support\ServiceProvider;

/**
 * Class CoreServiceProvider
 * @package LaravelIssueTracker\Core
 */
class CoreServiceProvider extends ServiceProvider
{

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        if( ! $this->app->routesAreCached() ) {
            require __DIR__.'/routes.php';
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}