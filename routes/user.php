<?php

use App\Http\Controllers\Manage\ProductController;
use App\Http\Controllers\Users\PageController;
use App\Http\Controllers\Users\AddressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\HomeController;
use App\Http\Controllers\Users\ProductDetailsController;
use App\Http\Controllers\Users\CartsController;
use App\Http\Controllers\Users\CheckoutController;
use App\Http\Controllers\Users\PaymentController;
use App\Http\Controllers\Users\PrescriptionController;
use App\Http\Controllers\Users\SearchController;
use App\Http\Controllers\SiteMapController;
use App\Http\Controllers\Users\BlogController;
use App\Http\Controllers\Users\FaqController;
use App\Http\Controllers\Users\UserController;

Route::get('/',  [HomeController::class, '__invoke'])->name('users.index');
Route::get('/dashboard',  [HomeController::class, '__invoke'])->name('index');
Route::get('/products/{id}/{url}', [ProductDetailsController::class, '__invoke'])->name('users.products');

Route::controller(CartsController::class)->group( function(){
Route::post('/cart/{id}',  'add')->name('carts.add');
Route::get('/carts/index/',  'Index')->name('carts.index');
Route::get('/delete/{id}',  'destroy')->name('carts.delete');
Route::post('updatecart', 'update')->name('carts.update');
Route::get('shop', 'update')->name('shops.index');
});

Route::controller(CheckoutController::class)->group(function(){
Route::get('/checkout/{cart?}', 'Index')->name('checkout.index');
Route::post('/checkout/shippinginformation', 'RegisterUser')->name('users.RegisterUser');
});

Route::controller(AddressController::class)->group(function(){
    Route::get('/checkout/address/index', 'ShippingAddress')->name('checkouts.changeAddress');
    Route::get('/checkout/address/change/{id}', 'UpdateDefaultAddress')->name('UpdateDefaultAddress');
    Route::get('/checkout/address/create', 'CreateAddress')->name('createAddress');
    Route::post('/checkout/address/store', 'StoreAddress')->name('storeAddress');
});

Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('paystack.checkout');
Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);


Route::controller(UserController::class)->group(function(){
    Route::get('/accounts/index', 'Index')->name('users.account.index');
    Route::get('/account/orders', 'Orders')->name('users.orders');
    Route::get('/account/orders/details/{id}', 'OrderDetails')->name('users.orders.details');
    Route::get('/account/address', 'Addresses')->name('users.account.address');
    Route::get('/account/address/edit/{id}', 'EditAddress')->name('users.address.edit');
    Route::post('/account/address/update/{id}', 'UpdateAddress')->name('users.address.update');
    Route::get('/account/address/create', 'CreateAddress')->name('users.address.create');
    Route::post('/account/address/store/', 'storeAddress')->name('users.address.store');
    Route::get('/account/address/delete/{id}', 'AddressDelete')->name('users.address.delete');
    Route::get('/account/recent/products/', 'recentViews')->name('users.recent.views');
    Route::get('/account/order/payments', 'OrderPayments')->name('users.order.payments');
    Route::get('/accounts/settings', 'AccountSettings')->name('users.account.settings');
    Route::post('/accounts/settings/update', 'UpdateAccountSettings')->name('users.settings.update');
});

Route::controller(SearchController::class)->group(function(){
    Route::get('/catalogs/{id?}', '__invoke')->name('products.search');
});

Route::controller(PageController::class)->group(function(){
Route::get('/pages/about', 'AboutUs')->name('AboutUs');
Route::get('/pages/terms', 'Terms')->name('pages.terms');
Route::get('/pages/privacypolicy', 'PrivacyPolicy')->name('PrivacyPolicy');
Route::get('/pages/contactus', 'ContactUs')->name('contactUs');
});

Route::controller(PrescriptionController::class)->group(function(){

    Route::get('/upload/prescription', 'Index')->name('user.prescription');
    Route::post('/doctor/prescription', 'PrescriptionStore')->name('doctores.prescription');

});

Route::get('upload/sitemap', [SiteMapController::class, 'SiteMap'])->name('site.map');

Route::get('blogs', [BlogController::class, 'Index'])->name('blogs.index');
Route::get('blogs/details/{id}', [BlogController::class, 'Details'])->name('blogs.details');
Route::get('/faq', [FaqController::class, '__invoke'])->name('faq.index');

Route::post('/product/rating', [ProductController::class, 'productRating'])->name('user.addReview');