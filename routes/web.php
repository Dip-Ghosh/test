<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'showLoginForm')->name('login.show');
    Route::post('/', 'login')->name('login.perform');
    Route::get('/register', 'showRegistrationForm')->name('register.show');
    Route::post('/register', 'register')->name('register.perform');
    Route::get('dashboard', 'dashboard')->name('admin.home');
    Route::get('logout', 'logout')->name('logout');
});
Route::controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('users.index');
});

