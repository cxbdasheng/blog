<?php

namespace App\Providers;

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
        \App\Models\Category::observe(\App\Observers\CategoryObserver::class);
        \App\Models\Tag::observe(\App\Observers\TagObserver::class);
        \App\Models\Articles::observe(\App\Observers\ArticleObserver::class);
        \App\Models\Navs::observe(\App\Observers\NavsObserver::class);
        \App\Models\Link::observe(\App\Observers\LinkObserver::class);
        \App\Models\Time::observe(\App\Observers\TimeObserver::class);
        \App\Models\Config::observe(\App\Observers\ConfigObserver::class);
        \App\Models\SocialiteUser::observe(\App\Observers\SocialiteUserObserver::class);
        \App\Models\SocialiteClient::observe(\App\Observers\SocialiteClientObserver::class);
        \App\Models\Comment::observe(\App\Observers\CommentObserver::class);
        \App\Models\User::observe(\App\Observers\UserObserver::class);
        ini_set('memory_limit', '512M');
    }
}
