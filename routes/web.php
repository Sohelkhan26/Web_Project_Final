<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactsController;
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



Route::get('/logout', [AuthController::class , 'logout'])->name('logout');

Route::get('/create' , function(){
    return view('createcontacts');
})->name('contacts.create');


Route::get('/contacts' , [ContactsController::class , 'showContacts'])->name('contacts');
Route::get('/contacts/{id}/edit', [ContactsController::class, 'edit'])->name('contacts.edit');
//Route::post('/contacts/{id}/edit',
//function (){
////    dd($id);
////    return view('temp');
//})->name('contacts.update');
Route::post('/contacts/{id}/edit' , [ContactsController::class , 'updateContacts'])->name('contacts.update');
Route::post('/create' , [ContactsController::class , 'store'])->name('contacts.store');

//Route::post('/sohel' , function (){
//    return "sohel";
//})->name('sohel');
