<?php

namespace App\Providers;

use App\Http\View\Composers\FrontPageComposer;
use App\Http\View\Composers\SidebarPageComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('partials.header', FrontPageComposer::class);
        View::composer('partials.sidebar', SidebarPageComposer::class);
    }
}
