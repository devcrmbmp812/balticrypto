<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Models\Setting;

class HeaderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

       $setting= Setting::find(1);

        View::composer('layouts.master','App\Http\ViewComposers\Header');
        View::composer('home.index','App\Http\ViewComposers\Header');
        View::share('footer_price', $setting->rate);
        View::share('footer_bonus', $setting->bonus);

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
