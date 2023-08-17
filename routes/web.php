<?php

use App\Http\Controllers\Admin\GalleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Front_end\HomePageController;
use App\Http\Services\Font_end\ProductService;
use App\Http\Controllers\Front_end\ProductController;
//use App\Http\Controllers\Front_end\FrontendController;
use App\Http\Controllers\Front_end\CheckoutController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Front_end\CustomerController;
use App\Http\Controllers\FrontController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can registerregister web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [HomePageController::class, 'index'])->name('homePage');
Route::get('/product-detail/{slug}.html', [ProductController::class, 'productDetail',])->name('productDetail');
Route::get('/category/{slug}.html', [ProductController::class, 'productsCategory',])->name('productsCategory');
Route::get('/thank-you', function () {
    return view('front_end.layout.Thankyou');
})->name('thankyou');

//Cart
Route::group(['as' => 'cart', 'prefix' => 'cart'], function () {
    Route::get('/', [FrontendController::class, 'cart']);
    Route::post('/add', [ProductService::class, 'addToCart'])->name('.add');
});

Route::group(['prefix' => 'services'], function () {
    Route::post('/load-quick.product', [ProductService::class, 'loadQickProduct']);
    Route::post('/check-product-quantity', [ProductService::class, 'checkProductQuantity']);
});

//Admin
Route::group(['prefix' => 'admin'], function () {
//    Admin Login
    Route::post('loginPost', [AccountController::class, 'loginPost'])->name('admin.loginPost');
    Route::get('login', [AccountController::class, 'login'])->name('admin.login');
//      Check Login
    Route::group(['middleware' => ['auth:sanctum', 'verified', 'auth.admin'], 'as' => 'admin.'], function () {
//      Account
//        Route::get('logout', [AccountController::class, 'logout'])->name('logout');
//      Home Page
        Route::get('/', [AccountController::class, 'index'])->name('dashboard');
//      Admin Category
        Route::resource('category', 'App\Http\Controllers\Admin\CategoriesController');
//      Admin Product
        Route::resource('product', 'App\Http\Controllers\Admin\ProductsController');
//      Admin Att
        Route::resource('attribute', 'App\Http\Controllers\Admin\AttProductController');
//      Admin coupon
        Route::resource('coupon', 'App\Http\Controllers\Admin\CouponsController');
//      Admin order
        Route::get('/order', [OrdersController::class, 'index'])->name('order');
        Route::get('/order-detail-{id}', [OrdersController::class, 'show'])->name('order.detail');

//      Ajax
        Route::post('ajaxColors', [GalleryController::class, 'ajaxSelectColors'])->name('ajaxSelectColors');
        Route::post('ajaxSizes', [GalleryController::class, 'ajaxSelectSizes'])->name('ajaxSelectSizes');
    });
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::group(['prefix' => 'user', 'as' => 'user'], function () {
        //Order
        Route::get('order', [CustomerController::class, 'order'])->name('.order');
        Route::get('order/show/{id}', [CustomerController::class, 'orderDetail'])->name('.order-detail');
        Route::get('order/review-{id}',[CustomerController::class, 'review'])->name('.order-review');
        Route::post('order/review/{orderId}',[CustomerController::class, 'reviewStore'])->name('.order-review-store');

        //ChangePassword
        Route::get('change-password',[CustomerController::class, 'changePassword'])->name('.change-password');
        Route::post('change-password-{id}',[CustomerController::class, 'updatePassword'])->name('.update-password');

    });
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
});


Route::get('/test-mail', function () {
    return view('mail.test-email');
});
Route::get('/message/send', [CustomerController::class,'mailOrderConfirm'])->name('front.fb');
//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified'
//])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//});
