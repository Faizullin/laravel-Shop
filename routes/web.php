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


Route::group(['prefix'=>'admin','namespace'=>'App\Http\Controllers\Admin','middleware'=>['sanctum:auth','can:admin']], function () {
    Route::group(['namespace'=>'Main'],function(){
        Route::get('/','IndexController' )->name('admin.main.index');
    });
    Route::group(['namespace'=>'Category','prefix'=>'categories'],function(){
        Route::get('/','IndexController' )->name('admin.category.index');
        Route::post('/create','StoreController' )->name('admin.category.store');
        Route::get('/edit/{category:slug}','EditController' )->name('admin.category.edit');
        Route::get('/{category:slug}','ShowController' )->name('admin.category.show');
        Route::patch('/edit/{category:slug}','UpdateController' )->name('admin.category.update');
        Route::delete('/','DeleteController' )->name('admin.category.delete');
    });
    Route::group(['namespace'=>'Tag','prefix'=>'tags'],function(){
        Route::get('/','IndexController' )->name('admin.tag.index');
        Route::post('/create','StoreController' )->name('admin.tag.store');
        Route::get('/edit/{tag:slug}','EditController' )->name('admin.tag.edit');
        Route::get('/{tag:slug}','ShowController' )->name('admin.tag.show');
        Route::patch('/edit/{tag:slug}','UpdateController' )->name('admin.tag.update');
        Route::delete('/','DeleteController' )->name('admin.tag.delete');
    });
    Route::group(['namespace'=>'Product','prefix'=>'products'],function(){
        Route::get('/','IndexController' )->name('admin.product.index');
        Route::post('/create','StoreController' )->name('admin.product.store');
        Route::get('/edit/{product}','EditController' )->name('admin.product.edit');
        Route::get('/{product}','ShowController' )->name('admin.product.show');
        Route::patch('/edit/{product}','UpdateController' )->name('admin.product.update');
        Route::delete('/','DeleteController' )->name('admin.product.delete');
    });
    Route::group(['namespace'=>'Color','prefix'=>'colors'],function(){
        Route::get('/','IndexController' )->name('admin.color.index');
        Route::post('/create','StoreController' )->name('admin.color.store');
        Route::get('/edit/{color:slug}','EditController' )->name('admin.color.edit');
        Route::get('/{color:slug}','ShowController' )->name('admin.color.show');
        Route::patch('/edit/{color:slug}','UpdateController' )->name('admin.color.update');
        Route::delete('/','DeleteController' )->name('admin.color.delete');
    });
    Route::group(['namespace'=>'User','prefix'=>'users'],function(){
        Route::get('/','IndexController' )->name('admin.user.index');
        Route::post('/create','StoreController' )->name('admin.user.store');
        Route::get('/edit/{user}','EditController' )->name('admin.user.edit');
        Route::get('/{user}','ShowController' )->name('admin.user.show');
        Route::patch('/edit/{user}','UpdateController' )->name('admin.user.update');
        Route::delete('/','DeleteController' )->name('admin.user.delete');
    });
});
Route::get("/{page}",App\Http\Controllers\Frontend\IndexController::class)->where('page','.*');