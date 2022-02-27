<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
})->name('home');

/*----==== rent a car  ===------*/
Route::get('rent', function () {
    return view('rent-a-car');
})->name('rent');

/*----==== car park   ===------*/
Route::get('park', function () {
    return view('car-park');
})->name('park');


/*----==== car brand   ===------*/
Route::get('brand', function () {
    return view('brand-car');
})->name('brand');

/*----==== user wallet  ===------*/

Route::get('wallet', function () {
    return view('wallet');
})->name('wallet');

/*----==== Product data   ===------*/

Route::get('product', function () {
    return view('product');
})->name('product');

/*----==== login   ===------*/

Route::get('login', function () {
    return view('login');
})->name('login');

/*----==== sign up    ===------*/

Route::get('signup', function () {
    return view('signup');
})->name('signup');

/*----==== forgotten password     ===------*/

Route::get('forgotten-pass', function () {
    return view('forgotten-pass');
})->name('forgotten-pass');
