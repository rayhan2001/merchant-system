<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Merchant\CategoryController;
use App\Http\Controllers\Merchant\MerchantAuthController;
use App\Http\Controllers\Merchant\ProductController;
use App\Http\Controllers\Merchant\StoreController;
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

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::get('/register', [AdminAuthController::class, 'showRegister'])->name('admin.register');
    Route::post('/register', [AdminAuthController::class, 'register'])->name('admin.register.submit');

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    });
});

// Merchant Routes
Route::prefix('merchant')->group(function () {
    Route::get('/login', [MerchantAuthController::class, 'showLogin'])->name('merchant.login');
    Route::post('/login', [MerchantAuthController::class, 'login'])->name('merchant.login.submit');
    Route::get('/register', [MerchantAuthController::class, 'showRegister'])->name('merchant.register');
    Route::post('/register', [MerchantAuthController::class, 'register'])->name('merchant.register.submit');
    
    Route::middleware(['auth', 'merchant'])->group(function () {
        Route::get('/dashboard', function () {
            return view('merchant.dashboard');
        })->name('merchant.dashboard');

        Route::post('/logout', [MerchantAuthController::class, 'logout'])->name('merchant.logout');

        // Store route for merchant
        Route::get('/store-list', [StoreController::class, 'index'])->name('store.list');
        Route::get('/create-store', [StoreController::class, 'create'])->name('store.create');
        Route::post('/store-merchant', [StoreController::class, 'store'])->name('merchant.store');

        // Category route for merchant
        Route::get('/category-list', [CategoryController::class, 'index'])->name('category.list');
        Route::get('/create-category', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store-category', [CategoryController::class, 'store'])->name('category.store');

        // Product route for merchant
        Route::get('/product-list', [ProductController::class, 'index'])->name('product.list');
        Route::get('/create-product', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store-product', [ProductController::class, 'store'])->name('product.store');
    });

});

Route::get('/', function () {
    return view('welcome');
});
