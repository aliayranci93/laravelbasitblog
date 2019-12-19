<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Page;
use App\Models\Category;
use App\Models\Setting;  // tüm modeller eriştik

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
        view()->share('setting',Setting::find(1));
        view()->share('pages',Page::whereStatu('1')->orderBy('order','ASC')->get());
        view()->share('categories',Category::orderBy('id','ASC')->get());
        // tüm viewlerde olması gereken şeyleri bu şekilde tüm viewlerle paylaşabiliriz.
    }
}
