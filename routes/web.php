<?php

use App\Http\Controllers\FloorController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AsignRoomController;
use App\Http\Controllers\AsignServiceController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReservationviewController;


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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/', function () {
        return view('welcome');
    });

    Route::resource('rooms', RoomController::class);
    Route::resource('types', TypeController::class);
    Route::resource('floors', FloorController::class);
    Route::resource('guests', GuestController::class);
    Route::resource('users', UserController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('asignrooms', AsignRoomController::class);
    Route::resource('asignservices', AsignServiceController::class);
    Route::resource('reservations', ReservationController::class);
    Route::resource('calendar', CalendarController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('reservationview', ReservationviewController::class);
    Route::resource('users', UserController::class);
});

// RUTA QUE SOLO ADMITE A LOS ADMINISTRADORES DE IT
//arreglar
Route::middleware(['checkUserRole'])->group(function () {
});

/*
Route::middleware(['checkHotelAdmin'])->group(function () {
    Route::resource('floors', FloorController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('types', TypeController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('asignrooms', AsignRoomController::class);
    Route::resource('asignservices', AsignServiceController::class);
    Route::resource('reservations', ReservationController::class);
    Route::resource('guests', GuestController::class);
});
*/
// RUTA COMENTADA POR EL MOMENTO
/* Route::middleware(['checkOperator'])->group(function() {
    Route::resource('guests', GuestController::class);
}); */
