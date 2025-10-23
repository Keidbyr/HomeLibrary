<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CopyController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
Route::get('/', function () {
    return view('layouts.app');
});
Route::get('/login', [LoginController::class, 'login'])->name('login');;
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/auth', [LoginController::class, 'authenticate']);
Route::get(  '/error', function() {
    return view( 'error', [ 'message' => session( 'message')]);
});

Route::get('/home', function () {return view('hello', ['title' => 'Hello World!']);});
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
Route::get('/copies', [CopyController::class, 'index'])->name('copies.index') ->middleware('auth');
Route::post('/copies', [CopyController::class, 'store'])->name('copies.store') ->middleware('auth');
Route::get('/copies/create', [CopyController::class, 'create'])->name('copies.create') ->middleware('auth');
Route::get('/copies/destroy/{copy}', [CopyController::class, 'destroy'])->name('copies.destroy') ->middleware('auth');
Route::get('/copies/{copy}', [CopyController::class, 'show'])->name('copies.show') ->middleware('auth');
Route::get('/copies/{copy}/edit', [CopyController::class, 'edit'])->name('copies.edit') ->middleware('auth');
Route::put('/copies/{copy}', [CopyController::class, 'update'])->name('copies.update') ->middleware('auth');

Route::delete('/copies/destroy/{copy}', [CopyController::class, 'destroy']) ->name('copies.destroy');

Route::get('/libraries', [LibraryController::class, 'index'])->name('libraries.index');
Route::get('/libraries/{id}', [LibraryController::class, 'show'])->name('libraries.show');

Route::get('/loans', [LoanController::class, 'index'])->name('loans.index');
Route::get('/loans/{id}', [LoanController::class, 'show'])->name('loans.show');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');


