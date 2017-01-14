<?php namespace LaravelIssueModules\Login;

use Illuminate\Support\ServiceProvider;

class LoginServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/Views', 'login');

        $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->loadTranslationsFrom(__DIR__.'/lang', 'login');

        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/laravel-issue-tracker/login'),
            __DIR__.'/views/assets/less' => resource_path('assets/laravel-issue-tracker/less'),
            __DIR__.'/views/assets/js' => resource_path('assets/laravel-issue-tracker/js')
        ], 'login');
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