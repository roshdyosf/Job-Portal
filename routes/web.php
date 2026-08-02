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

/*
--------------------------------------------------------------
Job routes
--------------------------------------------------------------
*/

Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', 'index');
    Route::view('/jobs/create', 'create');
    Route::post('/jobs', 'store');
    Route::get('/jobs/{job}/edit', 'edit');
    Route::patch('/jobs/{job}', 'update');
    Route::delete('/jobs/{job}', 'destroy');
    Route::get('/jobs/{job}', 'show');
});







