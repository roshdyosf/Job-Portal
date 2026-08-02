<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
//home
Route::get('/', function () {
    return view('home');


});



//contact
Route::get('/contact', function () {
    return view('contact');
});
/*
--------------------------------------------------------------
job routes
--------------------------------------------------------------
*/

Route::get('/jobs', [JobController::class, 'index']);

Route::get('/jobs/create', [JobController::class, 'create']);

Route::Post('/jobs', [JobController::class, 'store']);

Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);

Route::patch('/jobs/{job}', [JobController::class, 'update']);

Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

Route::get('/jobs/{job}', [JobController::class, 'show']);
