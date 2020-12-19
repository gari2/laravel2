<?php

namespace App\Providers;

use App\MyClasses\MyService;
use App\MyClasses\MyServiceInterface;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // config([
        //     'sample.data'=>['こんにちは','どうも', 'さようなら']
        // ]);
        app()->bind('App\MyClasses\MyServiceInterface', 'App\MyClasses\MyService');
    }
}
