<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\OrderController;
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



Auth::routes();




Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/collections', 'categories');
    Route::get('/collections/{category_slug}', 'products');
    Route::get('/collections/{category_slug}/{product_slug}', 'productView');
    Route::get('thank-you', 'thankYou');
    Route::get('new-arrival', 'newArrival');
    Route::get('featured', 'featuredProd');
    Route::get('search', 'searchProducts');
   
});

Route::middleware(['auth'])->group(function(){
    Route::get('wishlist',[WishlistController::class, 'index']);
    Route::get('cart',[CartController::class, 'index']);
    Route::get('checkout',[CheckoutController::class, 'index']);
    Route::get('orders',[OrderController::class, 'index']);
    Route::get('orders/{orderId}',[OrderController::class, 'show']);
    Route::get('orders/invoice/{orderId}',[OrderController::class, 'viewInvoice']);
    Route::get('orders/invoice/{orderId}/generate',[OrderController::class, 'generateInvoice']);

    Route::controller(App\Http\Controllers\Frontend\UserController::class)->group(function () {
        Route::get('user-profile', 'userprofile');
        Route::post('user-profile', 'store');
        Route::get('change-password', 'passwordcreate');
        Route::post('change-password', 'changepass');
    
    });

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
      
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}', 'update');

    });

    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('/sliders', 'index');
        Route::get('/sliders/create', 'create');
        Route::post('/sliders/create', 'store');
        Route::get('/sliders/{slider}/edit', 'edit');
        Route::post('/sliders/{slider}', 'update');
        Route::get('/sliders/{slider_id}/delete', 'destroy');
    });
    Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class);

    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{product}/edit', 'edit');
        Route::put('/products/{product}', 'update');
        Route::get('/products/{product_id}/delete', 'destroy');
        Route::get('product-image/{product_image_id}/delete', 'destroyImage');
        Route::post('product-color/{prod_color_id}', 'updateProductColorQty');
    
    });
    Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function () {
        Route::get('/colors', 'index');
        Route::get('/colors/create', 'create');
        Route::post('/colors', 'store');
        Route::get('/colors/{color}/edit', 'edit');
        Route::put('/colors/{color_id}', 'update');
        Route::get('/colors/{color_id}/delete', 'destroy');
        
    
    });
    Route::controller(App\Http\Controllers\Admin\OrderController::class)->group(function () {
        Route::get('/orders', 'index');
        Route::get('orders/{orderId}', 'show');
        Route::post('orders/{orderId}', 'updateOrderStatus');
        Route::get('invoice/{orderId}', 'viewInvoice');
        Route::get('invoice/{orderId}/generate', 'generateInvoice');
        Route::get('invoice/{orderId}/mail', 'mailInvoice');
    });
    Route::controller(App\Http\Controllers\Admin\SettingController::class)->group(function () {
        Route::get('/settings', 'index');
    });
    Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function () {
        Route::get('users', 'index');
        Route::post('users', 'store');
        Route::get('users/create', 'create');
        Route::get('users/{user_id}/edit', 'edit');
        Route::get('users/{user_id}/delete', 'delete');
        Route::put('users/{user_id}', 'update');
    });
        
    
});
Route::get('students',[StudentController::class, 'index']);
Route::post('students',[StudentController::class, 'store']);
Route::get('/fetch-students',[StudentController::class, 'view']);
