<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AsignRoomController;
use App\Http\Controllers\AsignServiceController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Reservation_viewController;


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
    Route::resource('reservationview', Reservation_viewController::class);


});

// VISTA QUE SOLO LOS ADMIN. PUEDEN VER
Route::middleware(['checkAdminUserRole'])->group(function(){
    Route::resource('users', UserController::class);
});


// VISTAS QUE PUEDEN ACCEDER LOS GERENTES
Route::middleware(['checkGerenteUserRole'])->group(function(){
    Route::resource('rooms', RoomController::class);
    Route::resource('types', TypeController::class);
    Route::resource('floors', FloorController::class);
    Route::resource('services', ServiceController::class);
});


// DESCOMENTAR ESTAS LINEAS UNA VEZ ACABADAS LAS ULTIMAS VISTAS
// SOLO LOS OPERARIOS PUEDEN ACCEDER A ESTAS VISTAS
Route::middleware(['checkOperarioUserRole'])->group(function() {
    Route::resource('asignrooms', AsignRoomController::class);
    Route::resource('asignservices', AsignServiceController::class);
    Route::resource('payments', PaymentController::class);
});



