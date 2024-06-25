<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceController;#
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HotelController::class, 'index'])->name('hotels.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware(['auth','admin'])->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//     Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index');
//     Route::get('/hotels/create', [HotelController::class, 'create'])->name('hotels.create');
//     Route::post('/hotels', [HotelController::class, 'store'])->name('hotels.store');
//     Route::get('/hotels/{hotel}', [HotelController::class, 'show'])->name('hotels.show');
//     Route::get('/hotels/{hotel}/edit', [HotelController::class, 'edit'])->name('hotels.edit');
//     Route::patch('/hotels/{hotel}', [HotelController::class, 'update'])->name('hotels.update');
//     Route::delete('/hotels/{hotel}', [HotelController::class, 'destroy'])->name('hotels.destroy');

//     //Logout
//     Route::post('/logout', [UserController::class, 'logout'])->middleware('auth')->name('logout');

//     // Show login form
//     Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//     Route::get('/hotels/{hotel}/rooms/create', [RoomController::class, 'create'])->name('rooms.create');
//     Route::post('/hotels/{hotel}/rooms', [RoomController::class, 'store'])->name('rooms.store');
//     Route::get('/hotels/{hotel}/rooms/{room}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
//     Route::patch('/hotels/{hotel}/rooms/{room}', [RoomController::class, 'update'])->name('rooms.update');
//     Route::delete('/hotels/{hotel}/rooms/{room}', [RoomController::class, 'destroy'])->name('rooms.destroy');
//     Route::get('/hotels/{hotel}/rooms/{room}', [RoomController::class, 'show'])->name('rooms.show');
//     Route::get('/hotels/{hotel}/rooms', [HotelController::class, 'index'])->name('rooms.index');

//     Route::get('/hotels/{hotel}/reviews', [ReviewController::class, 'index'])->name('reviews.index');
//     Route::get('/hotels/{hotel}/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
//     Route::post('/hotels/{hotel}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
//     Route::get('/reviews/{review}', [ReviewController::class, 'show'])->name('reviews.show');
//     Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
//     Route::patch('/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update');
//     Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

//     Route::get('/hotels/{hotel}/services', [ServiceController::class, 'index'])->name('services.index');
//     Route::get('/hotels/{hotel}/services/create', [ServiceController::class, 'create'])->name('services.create');
//     Route::post('/hotels/{hotel}/services', [ServiceController::class, 'store'])->name('services.store');
//     Route::get('/hotels/{hotel}/services/{service}', [ServiceController::class, 'show'])->name('services.show');
//     Route::get('/hotels/{hotel}/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
//     Route::put('/hotels/{hotel}/services/{service}', [ServiceController::class, 'update'])->name('services.update');
//     Route::delete('/hotels/{hotel}/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
// });

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['admin'])->group(function () {
        Route::get('/hotels/create', [HotelController::class, 'create'])->name('hotels.create');
        Route::post('/hotels', [HotelController::class, 'store'])->name('hotels.store');
        Route::get('/hotels/{hotel}/edit', [HotelController::class, 'edit'])->name('hotels.edit');
        Route::patch('/hotels/{hotel}', [HotelController::class, 'update'])->name('hotels.update');
        Route::delete('/hotels/{hotel}', [HotelController::class, 'destroy'])->name('hotels.destroy');

        
        //rooms
        Route::get('/hotels/{hotel}/rooms/create', [RoomController::class, 'create'])->name('rooms.create');
        Route::post('/hotels/{hotel}/rooms', [RoomController::class, 'store'])->name('rooms.store');
        Route::get('/hotels/{hotel}/rooms/{room}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
        Route::patch('/hotels/{hotel}/rooms/{room}', [RoomController::class, 'update'])->name('rooms.update');
        Route::delete('/hotels/{hotel}/rooms/{room}', [RoomController::class, 'destroy'])->name('rooms.destroy');
        

        //reviews
        Route::get('/hotels/{hotel}/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
        Route::post('/hotels/{hotel}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
        Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
        Route::patch('/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update');
        Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
    });

    Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index');
    Route::get('/hotels/{hotel}', [HotelController::class, 'show'])->name('hotels.show');
    Route::get('/hotels/{hotel}/rooms/{room}', [RoomController::class, 'show'])->name('rooms.show');
    Route::get('/hotels/{hotel}/rooms', [HotelController::class, 'index'])->name('rooms.index');
    Route::get('/reviews/{review}', [ReviewController::class, 'show'])->name('reviews.show');
    Route::get('/hotels/{hotel}/reviews', [ReviewController::class, 'index'])->name('reviews.index');

});


Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index');
Route::get('/hotels/{hotel}', [HotelController::class, 'show'])->name('hotels.show');







require __DIR__.'/auth.php';