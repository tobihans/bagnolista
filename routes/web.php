<?php

use App\Http\Controllers\CarsController;
use App\Http\Controllers\ReservationsController;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Category;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
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

require __DIR__ . '/auth.php';

Route::get('/', function (Request $request) {
    $search_brand = $request->query('brand', '');
    $search_category = $request->query('category', '');
    $cars = Car::where('is_available', true)->latest()->simplePaginate(50);
    $brands = Brand::all()->pluck('name');
    $categories = Category::all()->pluck('name');
    return view('welcome', compact('cars', 'brands', 'categories', 'search_brand', 'search_category'));
});

Route::get('/dashboard', function () {
    $reservations = Reservation::latest()->take(15)->get();
    $cars = Car::latest()->take(12)->get();
    $payments = Payment::latest()->take(9)->get();
    $user_stats = User::count();
    $resa_stats = Reservation::count();
    $payments_stats = Payment::count();
    return view('dashboard', compact(
        'reservations',
        'cars',
        'payments',
        'user_stats',
        'resa_stats',
        'payments_stats'
    ));
})->middleware(['auth'])->name('dashboard');

// TODO: Remove it from anywhere
Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

// Cars
Route::controller(CarsController::class)
    ->name('cars.')
    ->prefix('cars')
    ->middleware('auth')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('{car}', 'show')->whereNumber('car')->name('show')->withoutMiddleware('auth');
        Route::get('new', 'create')->name('create');
        Route::get('{car}/edit', 'edit')->whereNumber('car')->name('edit');
        Route::post('', 'store')->name('store');
        Route::put('{car}', 'update')->whereNumber('car')->name('update');
        Route::delete('{car}', 'destroy')->whereNumber('car')->name('destroy');
    });

// Reservations
Route::controller(ReservationsController::class)
    ->name('reservations.')
    ->prefix('reservations')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{reservation}', 'show')->whereNumber('reservation')->name('show');
        Route::get('/new', 'create')->name('create');
        Route::get('/{reservation}/edit', 'edit')->whereNumber('reservation')->name('edit');
        Route::post('/', 'store')->name('store');
        Route::put('/{reservation}', 'update')->whereNumber('reservation')->name('update');
        Route::delete('/{reservation}', 'destroy')->whereNumber('reservation')->name('destroy');
    });
