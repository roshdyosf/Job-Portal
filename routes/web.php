<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
/*
--------------------------------------------------------------
Home route
--------------------------------------------------------------
*/

Route::view('/', 'home');

/*
--------------------------------------------------------------
Contact route
--------------------------------------------------------------
*/

Route::view('/contact', 'contact');


/*
--------------------------------------------------------------
Auth routes
--------------------------------------------------------------
*/
Route::get('/register', [RegisterUserController::class, 'create'])->name('register');
Route::post('/register', [RegisterUserController::class, 'store'])->name('register.store');
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->name('login.store');



/*
--------------------------------------------------------------
Job routes
--------------------------------------------------------------
*/

Route::resource('jobs', JobController::class);






