<?php

use App\Http\Controllers\ProfileController;
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
    Route::post('/add', [CartController::class, 'add'])->name('add');
    Route::post('/remove', [CartController::class, 'remove'])->name('remove');
    Route::post('/purchase', [CartController::class, 'purchase'])->name('purchase');    
});

require __DIR__.'/auth.php';
