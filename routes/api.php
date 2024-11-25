<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

Route::middleware(['auth:sanctum', 'token.check'])->group(function () {
    Route::get('/blogs', [BlogController::class, 'index']);
    Route::post('/blogs', [BlogController::class, 'store']);
    Route::get('/blogs/{id}', [BlogController::class, 'show']);
    Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blog.edit');
    Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blog.delete');
});