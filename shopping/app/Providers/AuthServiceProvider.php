<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Phân quyền  menu
        Gate::define('menu-list','App\Policies\MenuPolicy@view');
        Gate::define('menu-add','App\Policies\MenuPolicy@create');
        Gate::define('menu-edit','App\Policies\MenuPolicy@edit');
        Gate::define('menu-delete','App\Policies\MenuPolicy@delete');

        //Phân quyền  category
        Gate::define('category-list','App\Policies\CategoryPolicy@view');
        Gate::define('category-add','App\Policies\CategoryPolicy@create');
        Gate::define('category-edit','App\Policies\CategoryPolicy@edit');
        Gate::define('category-delete','App\Policies\CategoryPolicy@delete');

        //Phân quyền  product
        Gate::define('product-list','App\Policies\ProductPolicy@view');
        Gate::define('product-add','App\Policies\ProductPolicy@create');
        Gate::define('product-edit','App\Policies\ProductPolicy@edit');
        Gate::define('product-delete','App\Policies\ProductPolicy@delete');

        //Phân quyền  slider
        Gate::define('slider-list','App\Policies\SliderPolicy@view');
        Gate::define('slider-add','App\Policies\SliderPolicy@create');
        Gate::define('slider-edit','App\Policies\SliderPolicy@edit');
        Gate::define('slider-delete','App\Policies\SliderPolicy@delete');

        //Phân quyền  setting
        Gate::define('setting-list','App\Policies\SettingPolicy@view');
        Gate::define('setting-add','App\Policies\SettingPolicy@create');
        Gate::define('setting-edit','App\Policies\SettingPolicy@edit');
        Gate::define('setting-delete','App\Policies\SettingPolicy@delete');

        //Phân quyền  user
        Gate::define('user-list','App\Policies\UserPolicy@view');
        Gate::define('user-add','App\Policies\UserPolicy@create');
        Gate::define('user-edit','App\Policies\UserPolicy@edit');
        Gate::define('user-delete','App\Policies\UserPolicy@delete');

        //Phân quyền  role
        Gate::define('role-list','App\Policies\RolePolicy@view');
        Gate::define('role-add','App\Policies\RolePolicy@create');
        Gate::define('role-edit','App\Policies\RolePolicy@edit');
        Gate::define('role-delete','App\Policies\RolePolicy@delete');

        //Phân quyền  permission
//        Gate::define('permission-add','App\Policies\PermissionPolicy@create');


    }
}
