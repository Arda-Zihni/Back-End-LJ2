<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MagazijnController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Magazijn routes
    Route::get('/magazijn', [MagazijnController::class, 'index'])->name('magazijn.index');
    Route::get('/magazijn/levering/{productId}', [MagazijnController::class, 'levering'])->name('magazijn.levering');
    Route::get('/magazijn/allergenen/{productId}', [MagazijnController::class, 'allergenen'])->name('magazijn.allergenen');
});

require __DIR__.'/auth.php';