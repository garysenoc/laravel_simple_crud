<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AccountController;
use App\Http\Controllers\Api\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);


// Route::apiResource('posts', PostController::class)->middleware('auth:sanctum');
Route::get('/accounts/get/{id}', [AccountController::class, 'getAccount']);
Route::put('/accounts/update/{id}', [AccountController::class, 'updateAccount']);

Route::apiResource('accounts', AccountController::class)->middleware('auth:sanctum');
Route::post('/accounts/login', [AccountController::class, 'login']);



Route::apiResource('contacts', ContactController::class);
// Route::get('/posts/{id}', [PostController::class, 'show']);
