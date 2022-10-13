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

Route::get('/admin', 'App\Http\Controllers\AdminController@loginAdmin');

Route::post('/admin', 'App\Http\Controllers\AdminController@postLoginAdmin');

Route::get('/home', function () {
    return view('home');
});

Route::prefix('admin')->group(function () {
    Route::prefix('catogories')->group(function () {
        //route den trang index cua category
        Route::get('/', [
            'as' => 'catogories.index',
            'uses' => 'App\Http\Controllers\CategoryController@index'
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
});
