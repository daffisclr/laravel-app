<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumniController;
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

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:Admin'])->group(function(){

    // Show Homepage for Admin
    Route::get('admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    // Admin Logout
    Route::get('admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    // Admin Profile
    Route::get('admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
});


Route::middleware(['auth', 'role:Alumni'])->group(function(){

    // Show Hompage for Alumni
    Route::get('alumni/dashboard', [AlumniController::class, 'AlumniDashboard'])->name('alumni.dashboard');

    // Alumni Logout
    Route::get('alumni/logout', [AlumniController::class, 'AlumniLogout'])->name('alumni.logout');
});

// Admin Login
Route::get('admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

// Alumni Login
Route::get('alumni/login', [AlumniController::class, 'AlumniLogin'])->name('alumni.login');
