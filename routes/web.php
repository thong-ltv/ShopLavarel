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

Route::get('/', 'App\Http\Controllers\AdminController@loginAdmin');

Route::post('/admin', 'App\Http\Controllers\AdminController@postLoginAdmin')->name('post');

Route::get('/home', function () {
    return view('home');
});

Route::prefix('admin')->group(function () {
    Route::prefix('catogories')->group(function () {
        //route den trang index cua category
        Route::get('/', [
            'as' => 'catogories.index',
            'uses' => 'App\Http\Controllers\CategoryController@index', 
            'middleware' => 'can:category-list'
        ]);

        Route::get('/indexAPI', [
            
            'uses' => 'App\Http\Controllers\CategoryController@indexAPI'
        ]);
    
        //route den trang create danh muc
        Route::get('/create', [
            'as' => 'catogories.create',
            'uses' => 'App\Http\Controllers\CategoryController@create'
        ]);
    
        Route::post('/store', [
            'as' => 'catogories.store',
            'uses' => 'App\Http\Controllers\CategoryController@store'
        ]);
    
        Route::get('/edit/{id}', [
            'as' => 'catogories.edit',
            'uses' => 'App\Http\Controllers\CategoryController@edit'
        ]);
    
        Route::post('/update/{id}', [
            'as' => 'catogories.update',
            'uses' => 'App\Http\Controllers\CategoryController@update'
        ]);
    
        Route::get('/delete/{id}', [
            'as' => 'catogories.delete',
            'uses' => 'App\Http\Controllers\CategoryController@delete'
        ]);
    });
    
    Route::prefix('menus')->group(function () {
        Route::get('/', [
            'as' => 'menus.index',
            'uses' => 'App\Http\Controllers\MenuController@index'
        ]);
    
        Route::get('/create', [
            'as' => 'menus.create',
            'uses' => 'App\Http\Controllers\MenuController@create'
        ]);
    
        Route::post('/store', [
            'as' => 'menus.store',
            'uses' => 'App\Http\Controllers\MenuController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'menus.edit',
            'uses' => 'App\Http\Controllers\MenuController@edit'
        ]);
    
        Route::post('/update/{id}', [
            'as' => 'menus.update',
            'uses' => 'App\Http\Controllers\MenuController@update'
        ]);
    
        Route::get('/delete/{id}', [
            'as' => 'menus.delete',
            'uses' => 'App\Http\Controllers\MenuController@delete'
        ]);
    });

    //product
    Route::prefix('products')->group(function () {
        Route::get('/', [
            'as' => 'products.index',
            'uses' => 'App\Http\Controllers\AdminProductController@index'
        ]);

        Route::get('/create', [
            'as' => 'products.create',
            'uses' => 'App\Http\Controllers\AdminProductController@create'
        ]);

        Route::post('/store', [
            'as' => 'products.store',
            'uses' => 'App\Http\Controllers\AdminProductController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'products.edit',
            'uses' => 'App\Http\Controllers\AdminProductController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'products.update',
            'uses' => 'App\Http\Controllers\AdminProductController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'products.delete',
            'uses' => 'App\Http\Controllers\AdminProductController@delete'
        ]);
    });

    Route::prefix('sliders')->group(function () {
        Route::get('/', [
            'as' => 'sliders.index',
            'uses' => 'App\Http\Controllers\AdminSliderController@index'
        ]);

        Route::get('/create', [
            'as' => 'sliders.create',
            'uses' => 'App\Http\Controllers\AdminSliderController@create'
        ]);

        Route::post('/store', [
            'as' => 'sliders.store',
            'uses' => 'App\Http\Controllers\AdminSliderController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'sliders.edit',
            'uses' => 'App\Http\Controllers\AdminSliderController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'sliders.update',
            'uses' => 'App\Http\Controllers\AdminSliderController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'sliders.delete',
            'uses' => 'App\Http\Controllers\AdminSliderController@delete'
        ]);
    });

    Route::prefix('settings')->group(function () {
        Route::get('/', [
            'as'=> 'settings.index',
            'uses' => 'App\Http\Controllers\AdminSettingController@index'
        ]);

        Route::get('/create', [
            'as' => 'settings.create',
            'uses' => 'App\Http\Controllers\AdminSettingController@create'
        ]);

        Route::post('/store', [
            'as' => 'settings.store',
            'uses' => 'App\Http\Controllers\AdminSettingController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'settings.edit',
            'uses' => 'App\Http\Controllers\AdminSettingController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'settings.update',
            'uses' => 'App\Http\Controllers\AdminSettingController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'settings.delete',
            'uses' => 'App\Http\Controllers\AdminSettingController@delete'
        ]);
    });
});

Route::prefix('users')->group(function () {
    Route::get('/', [
        'as' => 'users.index',
        'uses' => 'App\Http\Controllers\AdminUserController@index'
    ]);

    Route::get('/create', [
        'as' => 'users.create',
        'uses' => 'App\Http\Controllers\AdminUserController@create'
    ]);

    Route::post('/store', [
        'as' => 'users.store',
        'uses' => 'App\Http\Controllers\AdminUserController@store'
    ]);

    Route::get('/edit/{id}', [
        'as' => 'users.edit',
        'uses' => 'App\Http\Controllers\AdminUserController@edit'
    ]);

    Route::post('/update/{id}', [
        'as' => 'users.update',
        'uses' => 'App\Http\Controllers\AdminUserController@update'
    ]);

    Route::get('/delete/{id}', [
        'as' => 'users.delete',
        'uses' => 'App\Http\Controllers\AdminUserController@delete'
    ]);
});

Route::prefix('roles')->group(function () {
    Route::get('/', [
        'as' => 'roles.index',
        'uses' => 'App\Http\Controllers\AdminRoleController@index'
    ]);

    Route::get('/create', [
        'as' => 'roles.create',
        'uses' => 'App\Http\Controllers\AdminRoleController@create'
    ]);

    Route::post('/store', [
        'as' => 'roles.store',
        'uses' => 'App\Http\Controllers\AdminRoleController@store'
    ]); 

    Route::get('/edit/{id}', [
        'as' => 'roles.edit',
        'uses' => 'App\Http\Controllers\AdminRoleController@edit'
    ]);

    Route::post('/update/{id}', [
        'as' => 'roles.update',
        'uses' => 'App\Http\Controllers\AdminRoleController@update'
    ]);

});

Route::prefix('permissions')->group(function () {
    Route::get('/create', [
        'as' => 'permissions.create',
        'uses' => 'App\Http\Controllers\AdminPermissionController@createPermission'
    ]);

    Route::post('/store', [
        'as' => 'permissions.store',
        'uses' => 'App\Http\Controllers\AdminPermissionController@store'
    ]);
});


