<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index']);

Route::get('/tambah-posts', [PostController::class, 'create']);

Route::get('/edit-posts', [PostController::class, 'edit']);
