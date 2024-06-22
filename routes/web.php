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

    Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index');
    Route::get('/hotels/create', [HotelController::class, 'create'])->name('hotels.create');
    Route::post('/hotels', [HotelController::class, 'store'])->name('hotels.store');
    Route::get('/hotels/{hotel}', [HotelController::class, 'show'])->name('hotels.show');
    Route::get('/hotels/{hotel}/edit', [HotelController::class, 'edit'])->name('hotels.edit');
    Route::patch('/hotels/{hotel}', [HotelController::class, 'update'])->name('hotels.update');
    Route::delete('/hotels/{hotel}', [HotelController::class, 'destroy'])->name('hotels.destroy');
});


// Hotels
// Route::get('/hotels', [HotelController::class, 'store'])->middleware('auth');

// Route::get('/hotels/create',[HotelController::class, 'create'])->middleware('auth');

// Route::post('/hotels', [HotelController::class, 'store'])->name('hotels.store');

// Route::get('/hotels/{hotel}/edit', [HotelController::class, 'edit'])->middleware('auth');





require __DIR__.'/auth.php';