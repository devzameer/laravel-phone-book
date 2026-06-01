<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', [ContactController::class, 'signup']);
Route::get('/login', [ContactController::class, 'login']);
Route::post('/signup', [ContactController::class, 'store'])->name('signup.store');
