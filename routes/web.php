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

return redirect('/home');

});

Auth::routes();

// route for admin

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
// show all flights
Route::get('/admin/flights', [App\Http\Controllers\AdminController::class, 'showAllFlights'])->name('admin.flights');





//routes for user
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/history', [App\Http\Controllers\HomeController::class, 'history'])->name('history');


//routes for flight
//store flight
Route::post('/flights', [App\Http\Controllers\FlightController::class, 'store'])->name('flights.store');
//edit flight
Route::get('/flights/{flight}/edit', [App\Http\Controllers\FlightController::class, 'edit'])->name('flights.edit');
//update flight
Route::put('/flights/{flight}', [App\Http\Controllers\FlightController::class, 'update'])->name('flights.update');
//delete flight
Route::delete('/flights/{flight}', [App\Http\Controllers\FlightController::class, 'destroy'])->name('flights.destroy');

//to book a seat
Route::post('/flights/{flight}/book', [App\Http\Controllers\FlightController::class, 'book'])->name('flights.book');
//show flight
Route::get('/flights/{flight}', [App\Http\Controllers\FlightController::class, 'show'])->name('flights.show');




