<?php

use App\Http\Controllers\AirportController;
use App\Http\Controllers\AirrouteController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlanerController;

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
/*
Route::view('/welcome', 'welcome')->name('welcome');
*/

Route::redirect('/','/flights');


Route::resource('flights', FlightController::class);     // flight table CRUD
Route::resource('airplaners', PlanerController::class);  // airplaners table CRUD
Route::resource('airports', AirportController::class);   // airports table CRUD
Route::resource('airroutes', AirrouteController::class); // airroutes table CRUD

Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});


