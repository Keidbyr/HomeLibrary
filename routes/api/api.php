<?php

use App\Http\Controllers\BookControllerApi;
use App\Http\Controllers\CopyControllerApi;
use App\Http\Controllers\LibraryControllerApi;
use App\Http\Controllers\UserControllerApi;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;


Route::post('/login', [AuthController::class, 'login']);
Route::get('/books/{id}', [BookControllerApi::class, 'show']);
Route::get('/copies', [CopyControllerApi::class, 'index']);
Route::get('/copies/{id}', [CopyControllerApi::class, 'show']);
Route::get('/libraries', [LibraryControllerApi::class, 'index']);
Route::get('/libraries/{id}', [LibraryControllerApi::class, 'show']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/books', [BookControllerApi::class, 'index']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::get('/users/{id}', [UserControllerApi::class, 'show']);


Route::post('/copies', [CopyControllerApi::class, 'store']);
Route::put('/copies/{id}', [CopyControllerApi::class, 'update']);
Route::delete('/copies/{id}', [CopyControllerApi::class, 'destroy']);
