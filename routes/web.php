<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;    
use App\Http\Controllers\Frontend\wishlist;
use App\Http\Middleware\UserAuthentication;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\PayPalController;


Route::get('thank', function () {
    return view('thank');
})->name('thank'); 

Route::get('about-us', function () {
    return view('about-us');
})->name('about'); 

Route::get('contact','App\Http\Controllers\Frontend\ContactController@index')->name('contact');
Route::post('enquiry','App\Http\Controllers\Frontend\ContactController@enquiry')->name('submit.enquiry');


Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');
// frontend homecontroller
Route::any('/','App\Http\Controllers\Frontend\HomeController@index')->name('index')->middleware('deleteduser');;
// Route::get('about','App\Http\Controllers\Frontend\HomeController@about')->name('about');
Route::get('benefit','App\Http\Controllers\Frontend\HomeController@benefit')->name('benefit');
Route::get('privacy-policy','App\Http\Controllers\Frontend\HomeController@privacy')->name('privacy.policy');
Route::get('terms-and-condition','App\Http\Controllers\Frontend\HomeController@terms')->name('term.condition');

// frotend productcontroller
Route::get('categorywise/{id}','App\Http\Controllers\Frontend\ProductController@getProductsByCategoryId')->name('categorywise');
Route::get('sub-categorywise/{id}','App\Http\Controllers\Frontend\ProductController@getProductsBySubCategoryId')->name('subcategorywise');
Route::any('product/{id?}','App\Http\Controllers\Frontend\ProductController@getProductById')->name('single.product');
Route::get('products','App\Http\Controllers\Frontend\ProductController@getAllProducts')->name('all.product');

// // Cart Controllerr
Route::any('add-to-cart/{id}','App\Http\Controllers\Frontend\CartController@addToCart')->name('add.to.cart');
Route::any('checkout/remove/{id}','App\Http\Controllers\Frontend\CartController@removeCheckout')->name('checkout.remove');
Route::any('checkout/minus/{id}','App\Http\Controllers\Frontend\CartController@decreaseQuantity')->name('minus');
Route::any('checkout/plus/{id}','App\Http\Controllers\Frontend\CartController@increaseQuantity')->name('plus');
 
//  checkout Controller
Route::get('checkout','App\Http\Controllers\Frontend\CheckoutController@checkout')->name('checkout');
// Route::any('checkout/{postcode}','App\Http\Controllers\Frontend\CheckoutController@getPriceByPostCodeAndWeight')->name('checkout.shipping.weight.amount');



Route::get('register', 'App\Http\Controllers\Frontend\UserController@registerView')->name('register.view');
Route::post('post/register','App\Http\Controllers\Backend\RegisterController@register')->name('user.register');

 Route::middleware([UserAuthentication::class])->group(function(){ 
     Route::get('user-profile', 'App\Http\Controllers\Frontend\UserController@index')->name('user.profile');
     Route::post('update-profile', 'App\Http\Controllers\Frontend\UserController@updateProfile')->name('user.update.profile');
     Route::any('user-orders', 'App\Http\Controllers\Frontend\UserController@userOrders')->name('user.orders');
 });


Route::get('login', 'App\Http\Controllers\Frontend\UserController@loginView')->name('login.view');
Route::post('login','App\Http\Controllers\Backend\LoginController@login')->name('user.login');
Route::get('logout', 'App\Http\Controllers\Frontend\UserController@logout')->name('user.logout');

// password reset
Route::any('forgetpassword','App\Http\Controllers\Backend\ForgotPasswordController@forgotPassword')->name('user.forgotpassword');
Route::any('password','App\Http\Controllers\Backend\ForgotPasswordController@changePassword')->name('user.password');
Route::any('verified/{id}','App\Http\Controllers\Backend\ResetPasswordController@resetPassword')->name('user.code');


Route::get('user-profile', 'App\Http\Controllers\Frontend\UserController@index')->name('user.profile');
Route::post('update-profile', 'App\Http\Controllers\Frontend\UserController@updateProfile')->name('user.update.profile');
  

Route::get('checkout','App\Http\Controllers\Frontend\CheckoutController@checkout')->name('checkout');

Route::any('wishlist/{product_id}','App\Http\Controllers\Frontend\Wishlist@addToWishlist')->name('add.wishlist');

// Route::any('payment','App\Http\Controllers\Frontend\PaymentController@store')->name('payment.view');

// stripe
Route::post('payment', 'App\Http\Controllers\Backend\CheckoutControllerr@index')->name('stripe.payment');
Route::post('charge', 'App\Http\Controllers\Backend\CheckoutControllerr@charge')->name('card.charge');
Route::any('validate','App\Http\Controllers\Frontend\OrderController@orderValidation')->name('validate');
