<?php namespace LaravelIssueModules\Dashboard;

use Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'dashboard');

        $this->loadViewsFrom(resource_path('views/vendor/laravel-issue-tracker/dashboard'), 'dashboard');

        $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/laravel-issue-tracker/dashboard'),
        ], 'dashboard');
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