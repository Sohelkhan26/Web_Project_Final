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
Route::get('/forgot_password', [ForgotPasswordManager::class, 'forgot_password'])->name('forgot_password.view'); // Form for the password Reset Request
Route::post('/forgot_password', [ForgotPasswordManager::class, 'forgot_passwordPost'])->name('forgot_passwordPost'); // Submits the password Reset Request as the method is POST
Route::get('/resetPassword/{token}', [ForgotPasswordManager::class, 'resetPassword'])->name('resetPassword'); // Redirects the user to the password reset page
Route::post('/resetPassword', [ForgotPasswordManager::class, 'resetPasswordPost'])->name('resetPasswordPost'); // Assess the request and resets the password

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

Route::get('/contacts/export', [ContactsController::class, 'export'])->name('contacts.export');
Route::get('/contacts/import' , [ContactsController::class , 'showImportForm'])->name('contacts.importShow');

Route::post('/contacts/import', [ContactsController::class, 'import'])->name('contacts.import');
Route::get('/contacts/{id}/delete', [ContactsController::class, 'delete'])->name('contacts.delete');
