<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

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

Route::view('/register', 'users.register');
Route::view('/login', 'users.login');

/*
--------------------------------------------------------------
Job routes
--------------------------------------------------------------
*/

Route::resource('jobs', JobController::class);






