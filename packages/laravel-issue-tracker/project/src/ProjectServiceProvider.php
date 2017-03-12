<?php
namespace LaravelIssueTracker\Project;

use Illuminate\Support\ServiceProvider;

/**
 * Class ProjectServiceProvider
 * @package LaravelIssueTracker\Project
 */
class ProjectServiceProvider extends ServiceProvider
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