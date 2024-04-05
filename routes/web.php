<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RideController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/rides/create', [RideController::class, 'create'])->name('rides.create');
    Route::get('/rides', [RideController::class, 'index'])->name('rides.index');
    Route::post('/rides', [RideController::class, 'store'])->name('rides.store');
    Route::delete('/rides/{ride}', [RideController::class, 'destroy'])->name('rides.destroy');
});

require __DIR__ . '/auth.php';
