<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/home', function () {
    return view('home');
});

Route::prefix('admin')->group(function () {
    #Login and logout
    Route::get('/',[
        'as'=>'admin.login',
        'uses'=>'Admincontroller@loginAdmin'
    ]);
    Route::post('/',[
        'as'=>'admin.post-login',
        'uses'=>'Admincontroller@postLoginAdmin'
    ]);
    Route::get('/logout',[
        'as'=>'admin.logout',
        'uses'=>'Admincontroller@logout'
    ]);

    #Danh mục sản phẩm
    Route::prefix('categories')->group(function () {
        Route::get('/', [
            'as'=>'categories.index',
            'uses'=>'CategoryController@index',
            'middleware'=>'can:category-list'
        ]);
        Route::get('/create', [
            'as'=>'categories.create',
            'uses'=>'CategoryController@create',
            'middleware'=>'can:category-add'
        ]);

        #Submit form
        Route::post('/store', [
            'as'=>'categories.store',
            'uses'=>'CategoryController@store'
        ]);
        #Edit
        Route::get('/edit/{id}', [
            'as'=>'categories.edit',
            'uses'=>'CategoryController@edit',
            'middleware'=>'can:category-edit'
        ]);
        #Update
        Route::post('/update/{id}', [
            'as'=>'categories.update',
            'uses'=>'CategoryController@update'
        ]);
        #Delete
        Route::get('/delete/{id}', [
            'as'=>'categories.delete',
            'uses'=>'CategoryController@delete',
            'middleware'=>'can:category-delete'
        ]);

    });

    #Menu
    Route::prefix('menus')->group(function () {
        Route::get('/', [
            'as'=>'menus.index',
            'uses'=>'MenuController@index',
            'middleware'=>'can:menu-list'
        ]);
        Route::get('/create', [
            'as'=>'menus.create',
            'uses'=>'MenuController@create',
            'middleware'=>'can:menu-add'
        ]);

        #Submit form
        Route::post('/store', [
            'as'=>'menus.store',
            'uses'=>'MenuController@store'
        ]);
        #Edit
        Route::get('/edit/{id}', [
            'as'=>'menus.edit',
            'uses'=>'MenuController@edit',
            'middleware'=>'can:menu-edit'
        ]);
        #Update
        Route::post('/update/{id}', [
            'as'=>'menus.update',
            'uses'=>'MenuController@update'
        ]);
        #Delete
        Route::get('/delete/{id}', [
            'as'=>'menus.delete',
            'uses'=>'MenuController@delete',
            'middleware'=>'can:menu-delete'
        ]);

    });

    #Product
    Route::prefix('product')->group(function () {
        Route::get('/', [
            'as'=>'product.index',
            'uses'=>'AdminProductController@index',
            'middleware'=>'can:product-list'
        ]);
        Route::get('/search', [
            'as'=>'product.search',
            'uses'=>'AdminProductController@search'
        ]);
        Route::get('/create', [
            'as'=>'product.create',
            'uses'=>'AdminProductController@create',
            'middleware'=>'can:product-add'
        ]);

        #Submit form
        Route::post('/store', [
            'as'=>'product.store',
            'uses'=>'AdminProductController@store'
        ]);
        #Edit
        Route::get('/edit/{id}', [
            'as'=>'product.edit',
            'uses'=>'AdminProductController@edit',
            'middleware'=>'can:product-edit'
        ]);
        #Update
        Route::post('/update/{id}', [
            'as'=>'product.update',
            'uses'=>'AdminProductController@update'
        ]);
        #Delete
        Route::get('/delete/{id}', [
            'as'=>'product.delete',
            'uses'=>'AdminProductController@delete',
            'middleware'=>'can:product-delete'
        ]);

    });

    #Slider
    Route::prefix('slider')->group(function () {
        Route::get('/', [
            'as'=>'slider.index',
            'uses'=>'SliderAdminController@index',
            'middleware'=>'can:slider-list'
        ]);
        Route::get('/create', [
            'as'=>'slider.create',
            'uses'=>'SliderAdminController@create',
            'middleware'=>'can:slider-add'
        ]);

        #Submit form
        Route::post('/store', [
            'as'=>'slider.store',
            'uses'=>'SliderAdminController@store'
        ]);
        #Edit
        Route::get('/edit/{id}', [
            'as'=>'slider.edit',
            'uses'=>'SliderAdminController@edit',
            'middleware'=>'can:slider-edit'
        ]);
        #Update
        Route::post('/update/{id}', [
            'as'=>'slider.update',
            'uses'=>'SliderAdminController@update'
        ]);
        #Delete
        Route::get('/delete/{id}', [
            'as'=>'slider.delete',
            'uses'=>'SliderAdminController@delete',
            'middleware'=>'can:slider-delete'
        ]);

    });

    #Settings
    Route::prefix('settings')->group(function () {
        Route::get('/', [
            'as'=>'settings.index',
            'uses'=>'SettingAdminController@index',
            'middleware'=>'can:setting-list'
        ]);
        Route::get('/create', [
            'as'=>'settings.create',
            'uses'=>'SettingAdminController@create',
            'middleware'=>'can:setting-add'
        ]);

        #Submit form
        Route::post('/store', [
            'as'=>'settings.store',
            'uses'=>'SettingAdminController@store'
        ]);
        #Edit
        Route::get('/edit/{id}', [
            'as'=>'settings.edit',
            'uses'=>'SettingAdminController@edit',
            'middleware'=>'can:setting-edit'
        ]);
        #Update
        Route::post('/update/{id}', [
            'as'=>'settings.update',
            'uses'=>'SettingAdminController@update'
        ]);
        #Delete
        Route::get('/delete/{id}', [
            'as'=>'settings.delete',
            'uses'=>'SettingAdminController@delete',
            'middleware'=>'can:setting-delete'
        ]);

    });

    #Users
    Route::prefix('users')->group(function () {
        Route::get('/', [
            'as'=>'users.index',
            'uses'=>'AdminUserController@index',
            'middleware'=>'can:user-list'
        ]);
        Route::get('/create', [
            'as'=>'users.create',
            'uses'=>'AdminUserController@create',
            'middleware'=>'can:user-add'
        ]);

        #Submit form
        Route::post('/store', [
            'as'=>'users.store',
            'uses'=>'AdminUserController@store'
        ]);
        #Edit
        Route::get('/edit/{id}', [
            'as'=>'users.edit',
            'uses'=>'AdminUserController@edit',
            'middleware'=>'can:user-edit'
        ]);
        #Update
        Route::post('/update/{id}', [
            'as'=>'users.update',
            'uses'=>'AdminUserController@update'
        ]);
        #Delete
        Route::get('/delete/{id}', [
            'as'=>'users.delete',
            'uses'=>'AdminUserController@delete',
            'middleware'=>'can:user-delete'
        ]);

    });

    #Roles
    Route::prefix('roles')->group(function () {
        Route::get('/', [
            'as'=>'roles.index',
            'uses'=>'AdminRoleController@index',
            'middleware'=>'can:role-list'
        ]);
        Route::get('/create', [
            'as'=>'roles.create',
            'uses'=>'AdminRoleController@create',
            'middleware'=>'can:role-add'
        ]);

        #Submit form
        Route::post('/store', [
            'as'=>'roles.store',
            'uses'=>'AdminRoleController@store'
        ]);
        #Edit
        Route::get('/edit/{id}', [
            'as'=>'roles.edit',
            'uses'=>'AdminRoleController@edit',
            'middleware'=>'can:role-edit'
        ]);
        #Update
        Route::post('/update/{id}', [
            'as'=>'roles.update',
            'uses'=>'AdminRoleController@update'
        ]);
        #Delete
        Route::get('/delete/{id}', [
            'as'=>'roles.delete',
            'uses'=>'AdminRoleController@delete',
            'middleware'=>'can:role-delete'
        ]);

    });

    #Permissions
    Route::prefix('permissions')->group(function () {

        Route::get('/create', [
            'as'=>'permissions.create',
            'uses'=>'AdminPermissionController@create'
//            'middleware'=>'can:permission-add'
        ]);
        #Submit form
        Route::post('/store', [
            'as'=>'permissions.store',
            'uses'=>'AdminPermissionController@store'
        ]);
    });

    #Danh sách đơn hàng

    Route::prefix('cart')->group(function () {
        Route::get('/store', [
            'as'=>'cart.listCart',
            'uses'=>'AdminCartController@listCart'
        ]);
        Route::get('/store/detail/{id}', [
            'as'=>'cart.detailList',
            'uses'=>'AdminCartController@detailList'
        ]);


    });
});

