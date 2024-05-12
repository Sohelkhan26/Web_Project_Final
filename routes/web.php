<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if(!auth()->check()){
        return redirect()->route('login.form');
    }
    return view('profile');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class , 'showRegisterForm'])->name('register.form');
Route::post('/register',[AuthController::class,'signup'])->name('register.submit');

Route::get('/login', [AuthController::class , 'showLoginForm'])->name('login.form');
Route::post('/login',[AuthController::class,'login'])->name('login.submit');

Route::get('/profile', [ProfileController::class , 'showProfile'])->name('profile');
Route::post('/profile',[ProfileController::class,'updateProfile'])->name('profile.update');

//Route::get('/profile' , function(){
//    return view('profile');
//})->name('profile');

Route::get('/contacts' , function(){
    return view('contacts');
})->name('contacts');


Route::get('/logout', [AuthController::class , 'logout'])->name('logout');

Route::get('create' , function(){
    return view('create');
})->name('contacts.create');
