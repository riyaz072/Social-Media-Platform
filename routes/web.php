<?php

use App\Http\Controllers\Frontend\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.authentication.register');
});

// Route::get('/', function () {
//     return view('frontend.layout.app');
// });

Route::post('/registersave',[UserController::class,'registersave'])->name('registersave');
Route::get('/register',[UserController::class,'register'])->name('register');

Route::post('/loginsave',[UserController::class,'loginsave'])->name('loginsave');
Route::get('/login',[UserController::class,'login'])->name('login');

Route::get('/user/verify/{token}',[UserController::class,'verifyUser']);    

Route::get('forgot-password', [UserController::class, 'forgotPassword'])->name('forgot-password');
Route::post('verify-email',[UserController::class,'verifyEmail'])->name('verify-email'); 
Route::get('reset-password',[UserController::class,'resetPassword'])->name('reset-password');
Route::get('change-password/{token}', [UserController::class, 'changePassword'])->name('change-password');
Route::post('new-password/{token}', [UserController::class, 'newPassword'])->name('new-password');



Route::get('/logout',[UserController::class,'logout'])->name('logout');

