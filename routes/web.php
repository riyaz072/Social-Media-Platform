<?php

use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.authentication.register');
});


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

Route::middleware(AuthMiddleware::class)->group(function () {
    Route::resource('profile',ProfileController::class);
    // Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
    // Route::get('edit-profile', [ProfileController::class, 'editProfileForm'])->name('edit-profile-form');
    // Route::post('edit-profile', [ProfileController::class, 'updateProfile'])->name('edit-profile');
});