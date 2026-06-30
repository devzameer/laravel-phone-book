<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactCrudController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', [ContactController::class, 'signup']);
Route::get('/login', [ContactController::class, 'login'])->name('login');
Route::get('/contacts/login', function () {
    return redirect('/login');
});
Route::post('/signup', [ContactController::class, 'store'])->name('signup.store');
Route::post('/login', [ContactController::class, 'loginUser'])->name('login.user');

Route::middleware(['auth', 'prevent-back-history'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::put('/profile', [DashboardController::class, 'updateProfile'])->name('profile.update');
    Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');

    Route::resource('contacts', ContactCrudController::class)->except(['index', 'show']);
});