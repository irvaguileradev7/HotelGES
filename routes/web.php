<?php

use App\Http\Controllers\FloorController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\AddroomController;

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

Route::resource('rooms', RoomController::class);
Route::resource('types', TypeController::class);
Route::resource('floors', FloorController::class);
Route::resource('guests',GuestController::class);
Route::resource('addrooms',AddroomController::class);