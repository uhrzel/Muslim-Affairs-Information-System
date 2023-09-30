<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/user/{id}', [HomeController::class, 'userProfile'])->middleware(['auth', 'admin'])->name('admin.userProfile');
Route::get('/user/edit/{id}', [HomeController::class, 'userEdit'])->middleware(['auth', 'admin'])->name('admin.userEdit');
Route::patch('/user/edit/{id}', [HomeController::class, 'userUpdate'])->middleware(['auth', 'admin'])->name('admin.userUpdate');
Route::delete('/user/delete/{id}', [HomeController::class, 'userDelete'])->middleware(['auth', 'admin'])->name('admin.userDelete');

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/chatify', [HomeController::class, 'chatify'])->middleware(['auth', 'verified'])->name('chatify');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
