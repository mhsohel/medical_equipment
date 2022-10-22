<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Setting;
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

        $menus = Menu::where('status',1)->orderby('menu_sl','ASC')->get();
        \View::share('menus',$menus);

        $about = Setting::where('id',1)->first();
        \View::share('about',$about);

        $fcategories = Category::where('status',1)->get();
        \View::share('fcategories',$fcategories);

    }
}
