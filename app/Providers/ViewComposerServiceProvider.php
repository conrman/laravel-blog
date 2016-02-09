<?php

namespace Blog\Providers;

use Blog\Post;
use Blog\Tag;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->composeTagNameList();
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        //
    }

    /**
     * Compose the navigation view.
     *
     * @return Post $latest
     */
    public function composeTagNameList()
    {
        view()->composer('partials.nav', function ($view) {
            $view->with('tags', Tag::all('name'));
        });
    }
}
