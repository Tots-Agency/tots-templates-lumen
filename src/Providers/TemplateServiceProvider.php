<?php

namespace Tots\Templates\Providers;

use Illuminate\Support\ServiceProvider;

class TemplateServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register providers
        $this->app->register(\Illuminate\View\ViewServiceProvider::class);

        // Register migrations
        if($this->app->runningInConsole()){
            $this->registerMigrations();
        }
    }
    /**
     * Register migrations library
     *
     * @return void
     */
    protected function registerMigrations()
    {
        $mainPath = database_path('migrations');
        $paths = array_merge([
            './vendor/tots/templates-lumen/database/migrations'
        ], [$mainPath]);
        $this->loadMigrationsFrom($paths);
    }

    /**
     * Boot the blog services for the application.
     *
     * @return void
     */
    public function boot()
    {
        
    }
}
