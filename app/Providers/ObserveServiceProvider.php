<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ObserveServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        \App\Models\Category::observe(\App\Observers\CategoryObserver::class);
        \App\Models\Tag::observe(\App\Observers\TagObserver::class);
        \App\Models\Article::observe(\App\Observers\ArticleObserver::class);
        \App\Models\Nav::observe(\App\Observers\NavsObserver::class);
        \App\Models\Link::observe(\App\Observers\LinkObserver::class);
        \App\Models\Time::observe(\App\Observers\TimeObserver::class);
        \App\Models\Config::observe(\App\Observers\ConfigObserver::class);
        \App\Models\SocialiteUser::observe(\App\Observers\SocialiteUserObserver::class);
        \App\Models\SocialiteClient::observe(\App\Observers\SocialiteClientObserver::class);
        \App\Models\Comment::observe(\App\Observers\CommentObserver::class);
        \App\Models\User::observe(\App\Observers\UserObserver::class);
    }
}
