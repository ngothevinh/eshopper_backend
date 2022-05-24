<?php

namespace App\Providers;

use App\Components\Recusive;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


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
        $recusive=new Recusive(Category::all());
        $htmlOptionSearchHeader=$recusive->categoryRecusive($parentId='');
        View::share('htmlOptionSearchHeader',$htmlOptionSearchHeader);
        Schema::defaultStringLength(191);
    }
}
