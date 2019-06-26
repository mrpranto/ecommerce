<?php

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

Route::group([ 'namespace' => 'Frontend' ], function (){

    Route::get('/', 'HomeController@index')->name('frontend.home');
    Route::get('category/{category_slug}/{sub_category_slug}/{sub_sub_category_slug}', 'HomeController@category')->name('frontend.category');
    Route::get('product-details', 'HomeController@product_details')->name('frontend.product');

});


Route::group([ 'prefix' => 'admin', 'namespace' => 'Backend' ], function (){

    Route::get('/login', 'LoginController@index')->name('admin.login');
    Route::post('/login', 'LoginController@processLogin')->name('admin.login');


    Route::get('/register', function (){

        return view('backend.auth.register');

    });

    Route::group([ 'middleware' => 'auth:admin' ], function (){

        Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
        Route::get('/logout', 'DashboardController@logout')->name('admin.logout');

    });



});



