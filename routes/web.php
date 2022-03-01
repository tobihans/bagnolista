<?php

use App\Http\Controllers\CarsController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\SettingsController;
use App\Models\Car;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\User;
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

Route::get('/', fn () => view('welcome'));

Route::get('/dashboard', function () {
    $reservations = Reservation::latest()->take(15)->get();
    $cars = Car::latest()->take(12)->get();
    $payments = Payment::latest()->take(9)->get();
    $user_stats = User::all()->count();
    $non_available = Car::where('is_available', false)->count();
    $resa_stats = $non_available . ' / ' . Car::all()->count();
    $payments_stats = Payment::all()->count();
    return view('dashboard', compact(
        'reservations',
        'cars',
        'payments',
        'user_stats',
        'resa_stats',
        'payments_stats'
    ));
})->middleware(['auth'])->name('dashboard');

Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

// Cars
Route::controller(CarsController::class)
    ->name('cars.')
    ->prefix('cars')
    ->middleware('auth')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('{car}', 'show')->whereNumber('car')->name('show');
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
