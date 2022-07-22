<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user',function(Request $request){
    return $request->user();
});

Route::group(['namespace'=>'App\Http\Controllers\Api'],function(){
    Route::group(['namespace'=>'Product','prefix'=>'products'],function(){
        Route::match(array('GET','POST'),"/",'IndexController');
        Route::get("/filters",'FilterListController');
        Route::get("/{product}",'ShowController');
    });

    Route::group(['namespace'=>'Category','prefix'=>'categories'],function(){
        Route::get("/",'IndexController');
    });
    Route::group(['namespace'=>'Color','prefix'=>'colors'],function(){
        Route::get("/",'IndexController');
    });
    Route::group(['namespace'=>'Tag','prefix'=>'tags'],function(){
        Route::get("/",'IndexController');
    });
    Route::group(['namespace'=>'Order','prefix'=>'orders'],function(){
        Route::post("/",'StoreController');
    });
    Route::group(['namespace'=>'Auth','prefix'=>'auth'],function(){
        Route::group(['controller'=>AuthController::class],function(){
            Route::post('register', 'register');
            Route::post('login', 'login');
            Route::group(['middleware' => ['auth:sanctum']], function () {
                Route::post('/logout', 'logout');
                Route::get('/user', 'me');
            });
        });
        Route::group(['controller'=>ResetPasswordController::class],function(){
            Route::post('/forgot-password', 'sendResetLinkEmail');
            Route::post('/reset-password', 'resetPassword')->name('password.reset');
        });
    });
    Route::group(['namespace'=>'User','prefix'=>'user'],function(){
        Route::group(['middleware' => ['auth:sanctum']], function () {
            Route::get('/profile', 'ShowController');
        });
    });
});
