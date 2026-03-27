<?php

use App\Http\Controllers\BookControllerApi;
use App\Http\Controllers\CopyControllerApi;
use App\Http\Controllers\LibraryControllerApi;
use App\Http\Controllers\UserControllerApi;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;


Route::post('/login', [AuthController::class, 'login']);
Route::get('/libraries', [LibraryControllerApi::class, 'index']);
Route::get('/libraries/{id}', [LibraryControllerApi::class, 'show']);

Route::get('/books', [BookControllerApi::class, 'index']);
Route::get('/books/total', [BookControllerApi::class, 'total']);
Route::get('/books/{id}', [BookControllerApi::class, 'show']);

Route::get('/copies', [CopyControllerApi::class, 'index']);
Route::get('/copies/total', [CopyControllerApi::class, 'total']);
Route::get('/copies/{id}', [CopyControllerApi::class, 'show']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::get('/users/{id}', [UserControllerApi::class, 'show']);
