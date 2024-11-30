<?php
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CleaningScheduleController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', [HotelController::class, 'index'])->name('hotels.index');
Route::get('/', [HotelController::class, 'index'])->name('/home');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');



Route::get('/hotels', function () {
    return view('hotels.index');
});



// Route::middleware(['auth', 'admin'])->group(function () {
    
// });

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Route::get('/dashboard', function () {
//     return view('admin.dashboard',['user' => 'fedja']);
// });


Route::middleware(['auth'])->group(function () {
    
    Route::get('/reservations/{reservation}/payment/create', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('/reservations/payment/store', [PaymentController::class, 'store'])->name('payments.store');

    Route::get('/myprofile', [ProfileController::class, 'show'])->name('myprofile.show');

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
        
        //reservations
    Route::prefix('hotels/{hotel}')->group(function () {
        Route::get('reservations', [ReservationController::class, 'index'])->name('reservations.index');
        Route::get('rooms/{room}/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
        Route::post('rooms/{room}/reservations', [ReservationController::class, 'store'])->name('reservations.store');
        Route::get('reservations/{reservation}', [ReservationController::class, 'show'])->name('reservations.show');
        Route::get('reservations/{reservation}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
        Route::put('reservations/{reservation}', [ReservationController::class, 'update'])->name('reservations.update');
        Route::delete('reservations/{reservation}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
    });

        //reviews
    Route::get('/hotels/{hotel}/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/hotels/{hotel}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
    Route::patch('/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

    Route::get('/hotels/{hotel}/services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/hotels/{hotel}/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/hotels/{hotel}/services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/hotels/{hotel}/services/{service}', [ServiceController::class, 'show'])->name('services.show');
    Route::get('/hotels/{hotel}/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/hotels/{hotel}/services/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/hotels/{hotel}/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');

    Route::get('/reservations/{reservation}/payment/create', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('/reservations/payment/store', [PaymentController::class, 'store'])->name('payments.store');
    });

Route::get('/hotels/{hotel}', [HotelController::class, 'show'])->name('hotels.show');
Route::get('/hotels/{hotel}/rooms/{room}', [RoomController::class, 'show'])->name('rooms.show');
Route::get('/hotels/{hotel}/rooms', [HotelController::class, 'index'])->name('rooms.index');
Route::get('/reviews/{review}', [ReviewController::class, 'show'])->name('reviews.show');
Route::get('/hotels/{hotel}/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::get('/hotels/{hotel}/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
Route::post('/hotels/{hotel}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/reviews/{review}', [ReviewController::class, 'show'])->name('reviews.show');
Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
Route::patch('/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update');
Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

Route::get('/hotels/{hotel}/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/hotels/{hotel}/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/hotels/{hotel}/services', [ServiceController::class, 'store'])->name('services.store');
Route::get('/hotels/{hotel}/services/{service}', [ServiceController::class, 'show'])->name('services.show');
Route::get('/hotels/{hotel}/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
Route::put('/hotels/{hotel}/services/{service}', [ServiceController::class, 'update'])->name('services.update');
Route::delete('/hotels/{hotel}/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');

// reservations
Route::get('/hotels/{hotel}/rooms/{room}/cleaning-schedules', [CleaningScheduleController::class, 'index'])->name('cleaning_schedules.index');
Route::get('/hotels/{hotel}/rooms/{room}/cleaning-schedules/create', [CleaningScheduleController::class, 'create'])->name('cleaning_schedules.create');
Route::post('/hotels/{hotel}/rooms/{room}/cleaning-schedules', [CleaningScheduleController::class, 'store'])->name('cleaning_schedules.store');
Route::get('/hotels/{hotel}/rooms/{room}/cleaning-schedules/{cleaningSchedule}', [CleaningScheduleController::class, 'show'])->name('cleaning_schedules.show');
Route::get('/hotels/{hotel}/rooms/{room}/cleaning-schedules/{cleaningSchedule}/edit', [CleaningScheduleController::class, 'edit'])->name('cleaning_schedules.edit');
Route::patch('/hotels/{hotel}/rooms/{room}/cleaning-schedules/{cleaningSchedule}', [CleaningScheduleController::class, 'update'])->name('cleaning_schedules.update');
Route::delete('/hotels/{hotel}/rooms/{room}/cleaning-schedules/{cleaningSchedule}', [CleaningScheduleController::class, 'destroy'])->name('cleaning_schedules.destroy');


Route::get('/hotels/{hotel}', [HotelController::class, 'show'])->name('hotels.show');
Route::get('/hotels/{hotel}/rooms/{room}', [RoomController::class, 'show'])->name('rooms.show');

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/locale-switch', [LocaleController::class, 'switch'])->name('locale.switch');






require __DIR__.'/auth.php';