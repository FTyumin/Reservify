<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Hotels
Route::get('/hotels', [HotelController::class, 'store'])->middleware('auth');

Route::get('/hotels/create',[HotelController::class, 'create'])->middleware('auth');

Route::get('/hotels/{hotel}/edit', [HotelController::class, 'edit'])->middleware('auth');

// Update Listing
Route::put('/hotels/{listing}', [HotelController::class, 'update'])->middleware('auth');

// Delete Listing
Route::delete('/listings/{listing}', [HotelController::class, 'destroy'])->middleware('auth');



require __DIR__.'/auth.php';
