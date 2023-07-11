<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminCategoriesController;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\Admin\AdminShippingZoneMethodsController;
use App\Http\Controllers\Admin\AdminOrdersController;

use App\Http\Controllers\InicioController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\OrdersController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [InicioController::class, 'index'])->name('inicio');
Route::get('/catalogue', [CatalogueController::class, 'index'])->name('catalogue');
Route::get('/catalogue/{slug}', [CatalogueController::class, 'show'])->name('catalogue.product');
Route::get('/catalogue/category/{slug}', [CategoriesController::class, 'show'])->name('catalogue.category');
Route::get('/cart', [CartController::class, 'show'])->name('cart');
Route::view('/about', 'about')->name('about');
Route::view('/cheackout', 'store.cheackout')->name('cheackout');
Route::view('/thanks', 'store.thanks')->name('thanks');

Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');
Route::view('/resetpasword', 'auth.resetpassword')->name('resetpasword');

Route::post('/login/session', [LoginController::class, 'login'])->name('login.session');
Route::post('/register/session', [RegisterController::class, 'register'])->name('register.session');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::post('/save/data', [OrdersController::class, 'guardarPreOrders'])->name('save.data');
Route::post('/save/method', [OrdersController::class, 'registerMethod'])->name('save.method');
Route::post('/delete/data', [OrdersController::class, 'deletItemPreOrder'])->name('delete.data');
Route::post('/order/create', [OrdersController::class, 'create'])->name('order.create');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/page/{url}/{url2}', [AdminController::class, 'show'])->name('admin.page');

    Route::get('/admin/product/categorie', [AdminCategoriesController::class, 'index'])->name('admin.categorie');
    Route::post('/admin/product/categorie/create', [AdminCategoriesController::class, 'create'])->name('admin.categorie.create');
    Route::post('/admin/product/categorie/update', [AdminCategoriesController::class, 'update'])->name('admin.categorie.update');
    Route::post('/admin/product/categorie/delete/{id}', [AdminCategoriesController::class, 'delete'])->name('admin.categorie.delete');

    Route::get('/admin/product', [AdminProductsController::class, 'index'])->name('admin.product');
    Route::post('/admin/product/create', [AdminProductsController::class, 'create'])->name('admin.product.create');
    Route::post('/admin/product/delete/{id}', [AdminProductsController::class, 'delete'])->name('admin.product.delete'); 

    Route::get('/admin/orders/dashboard', [AdminOrdersController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/shipping/zone', [AdminShippingZoneMethodsController::class, 'index'])->name('admin.shipping');
    Route::post('/admin/shipping/create', [AdminShippingZoneMethodsController::class, 'create'])->name('admin.shipping.create');
    Route::post('/admin/shipping/delete/{id}', [AdminShippingZoneMethodsController::class, 'delete'])->name('admin.shipping.delete');
});