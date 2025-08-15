<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\AuthenticationController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class)
    ->middleware('auth');

Route::resource('users', UserController::class)
    ->middleware('auth');

Route::resource('komentar', KomentarController::class)
    ->middleware('auth');

Route::get('/login', [AuthenticationController::class, 'index'])
    ->name('login')
    ->middleware('guest');

Route::post('/do-post', [AuthenticationController::class, 'doPost'])
    ->name('do-post')
    ->middleware('guest');

Route::post('/do-logout', [AuthenticationController::class, 'doLogout'])
    ->name('do-logout')
    ->middleware('auth');

Route::post('/do-register', [AuthenticationController::class, 'doRegister'])
    ->name('do-Register')
    ->middleware('guest');

Route::get('/register', [AuthenticationController::class, 'register'])  
    ->name('register');
