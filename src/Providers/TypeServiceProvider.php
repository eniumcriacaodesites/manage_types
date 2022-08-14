<?php

namespace EniumCriacaoSites\Types\Providers;

use Illuminate\Support\ServiceProvider;

class TypeServiceProvider extends ServiceProvider
{

    public function boot()
    {
        // $this->publishConfig();
        // $this->registerCommands();
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    public function register()
    {
    }

    public function provides()
    {
        return [
            EloquentFilter\ServiceProvider::class
        ];
    }
}