<?php

namespace App\Providers;

use App\Page;
use Illuminate\Support\ServiceProvider;

class NavViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.partials.nav', function($view)
        {
           $view->with('pages', Page::latest('published_at')->published()->get());
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
