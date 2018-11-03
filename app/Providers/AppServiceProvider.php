<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

use App\Http\ViewComposers\HomeComposer;

use App\Notification;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::composer('home', HomeComposer::class);
        View::composer('menu.mainmenu', HomeComposer::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
