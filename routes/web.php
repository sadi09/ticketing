<?php

use App\Http\Controllers\BusController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\SeatAllocationController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TripController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('buses/new', [BusController::class, 'newBus']);

Route::get('/dashboard', [TripController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/bus', [BusController::class, 'index'])->middleware(['auth', 'verified'])->name('bus');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/make-trip', [TripController::class, 'index']);
    Route::post('/search-trip', [TripController::class, 'search']);


    Route::get('/location', [LocationController::class, 'index'])->name('location');
    Route::post('/location/delete', [LocationController::class, 'deleteLocation']);
    Route::post('/new-location', [LocationController::class, 'insertLocation']);


    Route::get('/book-ticket/{id}', [SeatAllocationController::class, 'index']);

    Route::post('/new-bus', [BusController::class, 'insertBus']);
    Route::post('/edit-bus/{id}', [BusController::class, 'editBus']);
    Route::post('/bus/delete', [BusController::class, 'deleteBus']);
    Route::get('/bus/edit/{id}', [BusController::class, 'editUI'])->name('bus.edit');


    Route::get('/staff', [StaffController::class, 'index'])->name('staff');
    Route::post('/new-staff', [StaffController::class, 'insertStaff']);
    Route::get('/staff/edit/{id}', [StaffController::class, 'editUI'])->name('staff.edit');
    Route::post('/edit-staff/{id}', [StaffController::class, 'editStaff']);


    Route::get('/bus-route', [RouteController::class, 'index'])->name('bus-route');
    Route::post('/new-route', [RouteController::class, 'insertRoute']);



    Route::get('/trip', [TripController::class, 'index'])->name('trip');
    Route::post('/new-trip', [TripController::class, 'insertTrip'])->name('trip');
});

require __DIR__ . '/auth.php';
