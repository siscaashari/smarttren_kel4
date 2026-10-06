<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

// Route Khusus Admin
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); 
    })->name('admin.dashboard');
    
    // Membuat 7 jalur otomatis untuk CRUD User
    Route::resource('users', UserController::class); 
});

// Route Khusus Mahasantri
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard-mahasantri', function () {
        return view('dashboard'); 
    })->name('dashboard.mahasantri');
});

require __DIR__.'/auth.php';