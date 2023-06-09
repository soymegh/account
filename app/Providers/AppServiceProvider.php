<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Inertia::share([
            'errors' =>function(){
            return Session::get('errors')
                ? Session::get('errros')->getBag('default')->getMessage()
                : (object) [];
            }
        ]);
        Inertia::share('flash', function(){
            return[
                'message' => Session::get('message'),
            ];
        });

        Inertia::share('csrf_token', function (){
            return csrf_token();
        });
    }
}
