<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () { return view('welcome'); });

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {

    // Reports Resource
    Route::resource('reports', ReportController::class)->except(['create', 'store', 'update', 'destroy'])->names([
        'index' => 'admin.reports',
        'show' => 'admin.reportShow',
        'edit' => 'admin.reportEdit',
    ]);

    // Advertisements
    Route::resource('advertisements', AdvertisementController::class)->except(['create', 'store', 'update', 'destroy'])->names([
        'index' => 'admin.advertisements',
        'show' => 'admin.advertisementShow',
        'edit' => 'admin.advertisementEdit',
    ]);

    // Events
    Route::resource('events', EventController::class)->except(['create', 'store', 'update', 'destroy'])->names([
        'index' => 'admin.events',
        'show' => 'admin.eventShow',
        'edit' => 'admin.eventEdit',
    ]);

    // Users
    Route::resource('users', UserController::class)->except(['create', 'store'])->names([
        'index' => 'admin.users',
        'show' => 'admin.userShow',
        'edit' => 'admin.userEdit',
        'update' => 'admin.userUpdate',
        'destroy' => 'admin.userDestroy',
    ]);

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
