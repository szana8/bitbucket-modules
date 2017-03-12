<?php
namespace LaravelIssueTracker\Authentication;

use Illuminate\Support\ServiceProvider;

/**
 * Class AuthenticationServiceProvider
 * @package LaravelIssueTracker\Authentication
 */
class AuthenticationServiceProvider extends ServiceProvider
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
        $this->mergeConfigFrom(__DIR__.'/Config/services.php', 'services');
    }

}