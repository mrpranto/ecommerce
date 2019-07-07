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


    Route::group([ 'middleware' => 'auth:admin' ], function (){

        Route::get('/', 'DashboardController@index')->name('admin.dashboard');
        Route::get('/logout', 'DashboardController@logout')->name('admin.logout');

        Route::resource('category', 'CategoryController');

        Route::resource('sub-category', 'SubCategoryController');

        Route::resource('sub-sub-category', 'Sub_subCategoryController');
        Route::get('get-sub-category', 'Sub_subCategoryController@getSubcategories')->name('admin.sub-sub-category.sub-Categoires');

        Route::resource('brand', 'BrandController');

        Route::resource('product', 'ProductController');
        Route::get('sub-Categoires', 'ProductController@getSubCategory')->name('admin.product.sub-Categoires');
        Route::get('sub-sub-Categoires', 'ProductController@getSub_subCategory')->name('admin.product.sub-sub-Categoires');
        Route::get('active/{id}', 'ProductController@published')->name('admin.product.published');
        Route::get('deactive/{id}', 'ProductController@unpublished')->name('admin.product.un-published');
        Route::get('delete-product-image/{id}', 'ProductController@delete_product_image')->name('admin.product.delete-image');


    });



});



