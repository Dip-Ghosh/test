<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'index')->name('login');
    Route::post('post-login', 'login')->name('login.post');
    Route::get('registration', 'registration')->name('register');
    Route::post('registration', 'postRegistration')->name('register.post');
    Route::get('dashboard', 'dashboard')->name('admin.home');
    Route::get('logout', 'logout')->name('logout');
});

