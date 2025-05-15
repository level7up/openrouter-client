<?php
declare(strict_types=1);

namespace Level7up\OpenRouter;

use Illuminate\Support\ServiceProvider;

class OpenRouterServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/openrouter.php', 'openrouter');

        $this->app->singleton(OpenRouterClient::class, function ($app) {
            return new OpenRouterClient(config('openrouter'));
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/openrouter.php' => config_path('openrouter.php'),
        ], 'config');
    }
}
