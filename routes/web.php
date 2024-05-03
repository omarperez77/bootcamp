<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Chirp;
	// Add this line
Route::get('/', function () {
    return view('welcome');
});

Route::get('/chirps', [ChirpController::class, 'index'])->name('chirps.index');

Route::post('/chirps', [ChirpController::class, 'store'])->name('chirps.store');

Route::get('/dasreturnhboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
