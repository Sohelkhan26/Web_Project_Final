<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ForgotPasswordManager;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AuthGuard;
use App\Http\Middleware\CustomThrottleRequests;
use Illuminate\Support\Facades\Route;

Route::get('/register', [AuthController::class , 'showRegisterForm'])->name('register.form');
Route::post('/register',[AuthController::class,'signup'])->name('register.submit');

Route::get('/login', [AuthController::class , 'showLoginForm'])->name('login.form');
Route::post('/login',[AuthController::class,'login'])->name('login.submit')->middleware('throttle:3,1');

Route::get('/logout', [AuthController::class , 'logout'])->name('logout');

Route::get('/temp' , function (){
    return view('temp');
});


//forgot password
Route::get('/forgot_password', [ForgotPasswordManager::class, 'forgot_password'])->name('forgot_password.view');
Route::post('/forgot_password', [ForgotPasswordManager::class, 'forgot_passwordPost'])->name('forgot_passwordPost');
Route::get('/resetPassword/{token}', [ForgotPasswordManager::class, 'resetPassword'])->name('resetPassword');
Route::post('/resetPassword', [ForgotPasswordManager::class, 'resetPasswordPost'])->name('resetPasswordPost');

Route::middleware(AuthGuard::class)->group(function(){
    Route::get('/', function () {
        return view('profile');
    });
    Route::post('/contacts/{id}/edit' , [ContactsController::class , 'updateContacts'])->name('contacts.update');
    Route::post('/create' , [ContactsController::class , 'store'])->name('contacts.store');

    Route::get('/profile', [ProfileController::class , 'showProfile'])->name('profile');
    Route::post('/profile',[ProfileController::class,'updateProfile'])->name('profile.update');
    Route::get('/create' , function(){
        return view('createcontacts');
    })->name('contacts.create');

    Route::get('/contacts' , [ContactsController::class , 'showContacts'])->name('contacts');
    Route::get('/contacts/{id}/edit', [ContactsController::class, 'edit'])->name('contacts.edit');
});
