<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\User\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::controller(AuthController::class)->group(function () {
Route::post('/register', 'register');
Route::post('/login' , 'login');
Route::post('/logout', 'logout');
});

Route::resource('book', BookController::class);
