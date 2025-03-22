<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
 /*    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); */
    Route::resources([
        'users' => UserController::class
    ]);

    Route::resources([
        'rooms' => RoomController::class
    ]);

    Route::resources([
        'bookings' => BookingController::class
    ]);

});

Route::post('users/search',[UserController::class,'search']);
Route::post('rooms/search',[RoomController::class,'search']);
Route::post('bookings/search',[BookingController::class,'search', 'store', 'index']);

require __DIR__.'/auth.php';
