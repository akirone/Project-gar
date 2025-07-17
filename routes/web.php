<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'dataPost']);

Route::get('/tambah-posts', [PostController::class, 'create']);

Route::get('/edit-posts/{id}', [PostController::class, 'edit']);

Route::post('/store', [PostController::class, 'store']);

Route::put('/update/{id}', [PostController::class, 'update']);
