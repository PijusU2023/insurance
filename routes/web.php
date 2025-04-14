<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\ReplaceShortCodes;


Route::get('/', fn () => Redirect::to('/login'));


Route::get('/dashboard', fn () => Redirect::to('/cars'));


Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])
    ->name('login')
    ->middleware(ReplaceShortCodes::class);

Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])
    ->name('register')
    ->middleware(ReplaceShortCodes::class);

Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])
    ->name('logout');


Route::middleware(['auth', ReplaceShortCodes::class])->group(function () {
    // View-only access
    Route::resource('cars', CarController::class)->only(['index', 'show', 'create', 'store']);
    Route::resource('owners', OwnerController::class)->only(['index', 'show', 'create', 'store']);


    Route::get('/cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
    Route::put('/cars/{car}', [CarController::class, 'update'])->name('cars.update');
    Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');

    Route::get('/owners/{owner}/edit', [OwnerController::class, 'edit'])->name('owners.edit');
    Route::put('/owners/{owner}', [OwnerController::class, 'update'])->name('owners.update');
    Route::delete('/owners/{owner}', [OwnerController::class, 'destroy'])->name('owners.destroy');

    // Home
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
