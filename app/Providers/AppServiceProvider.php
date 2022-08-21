<?php

namespace App\Providers;

use App\Support\TencentTranslate;
use Illuminate\Container\ContextualBindingBuilder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        ini_set('memory_limit', '512M');

        $contextual_binding_builder = $this->app->when(TencentTranslate::class);

        assert($contextual_binding_builder instanceof ContextualBindingBuilder);
        $contextual_binding_builder->needs('$secret_id')->giveConfig('services.tencent_cloud.secret_id', '');
        $contextual_binding_builder->needs('$secret_key')->giveConfig('services.tencent_cloud.secret_key', '');
        $contextual_binding_builder->needs('$region')->giveConfig('services.tencent_cloud.region', '');
        $contextual_binding_builder->needs('$project_id')->giveConfig('services.tencent_cloud.project_id', 0);

    }
}
