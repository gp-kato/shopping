<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kart;

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

Route::get('/', function () {
    return view('products');
});

Route::get('/2', function () {
    return view('products2');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/company', function () {
    return view('company');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/item{item}', function () {
    return view('item{item}');
});
