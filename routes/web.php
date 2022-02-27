<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $reservations = Reservation::all()->take(15);
    $cars = Car::all()->take(12);
    $payments = Payment::all()->take(9);
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

require __DIR__ . '/auth.php';
