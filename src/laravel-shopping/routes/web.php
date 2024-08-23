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
Route::post('/add', [CartController::class, 'add'])->name('add');
Route::post('/remove', [CartController::class, 'remove'])->name('remove');
Route::post('/purchase', [CartController::class, 'purchase'])->name('purchase');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
