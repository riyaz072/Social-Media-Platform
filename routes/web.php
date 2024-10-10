<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('register');
});

Route::post('/registersave',[UserController::class,'registersave'])->name('registersave');
Route::get('/register',[UserController::class,'register'])->name('register');

Route::post('/loginsave',[UserController::class,'loginsave'])->name('loginsave');
Route::get('/login',[UserController::class,'login'])->name('login');

Route::get('/logout',[UserController::class,'logout'])->name('logout');

