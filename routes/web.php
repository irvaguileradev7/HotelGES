<?php

use App\Http\Controllers\FloorController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;

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

    Route::get('/reservation/catalogue', function () {
        return view('reservation/catalogue');
    });

    Route::resource('rooms', RoomController::class);
    Route::resource('types', TypeController::class);
    Route::resource('floors', FloorController::class);
    Route::resource('guests', GuestController::class);
    Route::resource('users', UserController::class);
    Route::resource('services', ServiceController::class);
});