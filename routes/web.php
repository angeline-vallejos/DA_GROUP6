<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route for the welcome page
Route::get('/', function () {
    return view('welcome');
});

// Route for dashboard with data and middleware
Route::get('/dashboard', [DataController::class, 'pieChart','barChart'])  // Updated method name
    ->middleware(['auth', 'verified'])->name('dashboard');

// Group routes requiring authentication
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include authentication routes
require __DIR__.'/auth.php';

