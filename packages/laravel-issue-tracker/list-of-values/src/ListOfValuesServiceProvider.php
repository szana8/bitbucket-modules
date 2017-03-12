<?php
namespace LaravelIssueTracker\ListOfValues;

use Illuminate\Support\ServiceProvider;

/**
 * Class ListOfValuesServiceProvider
 * @package LaravelIssueTracker\ListOfValues
 */
class ListOfValuesServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

        $this->loadMigrationsFrom(__DIR__.'/migrations');

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