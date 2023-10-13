<?php

namespace LaravelLiberu\Files;

use Illuminate\Support\ServiceProvider;
use LaravelLiberu\DynamicMethods\Services\Methods;
use LaravelLiberu\Files\Dynamics\Relations\FavoriteFiles;
use LaravelLiberu\Users\Models\User;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->load()
            ->publish();

        Methods::bind(User::class, [FavoriteFiles::class]);
    }

    private function load()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

        $this->mergeConfigFrom(__DIR__.'/../config/files.php', 'liberu.files');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        return $this;
    }

    private function publish()
    {
        $this->publishes([
            __DIR__.'/../config' => config_path('liberu'),
        ], ['files-config', 'liberu-config']);

        $this->publishes([
            __DIR__.'/../database/factories' => database_path('factories'),
        ], ['files-factory', 'liberu-factories']);

        return $this;
    }
}
