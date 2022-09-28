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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

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

    Route::get('/delete/{id}', [
        'as' => 'catogories.delete',
        'uses' => 'App\Http\Controllers\CategoryController@delete'
    ]);
});