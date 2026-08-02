<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;

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
Route::view('/login', 'users.login');



/*
--------------------------------------------------------------
Job routes
--------------------------------------------------------------
*/

Route::resource('jobs', JobController::class);






