<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
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

Route::get('/', [ProductController::class, 'index'])->name('index');

Route::get('/index', [ProductController::class, 'product'])->name('product');

Route::get('/company', [ProductController::class, 'company'])->name('company');

Route::get('/about', [ProductController::class, 'about'])->name('about');

Route::get('/item/{product}', [ProductController::class, 'show'])->name('show');

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'cart'])->name('cart');
    // ルートのURLは統一してRouteのmethodで区別させる(get,post,delete)
    Route::post('/cart/{product}', [CartController::class, 'add'])->name('add');
    Route::delete('/cart/{product}', [CartController::class, 'remove'])->name('remove');
    Route::post('/purchase', [CartController::class, 'purchase'])->name('purchase');    
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
    Route::resource('products', AdminController::class);
});

require __DIR__.'/auth.php';
