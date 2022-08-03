<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('customers', CustomerController::class); 
    $router->resource('products', ProductController::class);
    $router->resource('categories', CategoryController::class);
    $router->resource('sub-categories', SubCategoryController::class);
    $router->resource('orders', OrderController::class);
     $router->resource('payments', PaymentController::class);
     $router->resource('shipping-details', ShippingDetailsController::class);
     $router->resource('reviews', ReviewController::class);
     


});
