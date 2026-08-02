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
//index
Route::get('/jobs', [JobController::class, 'index']);

//create
Route::get('/jobs/create', [JobController::class, 'create']);

//store
Route::Post('/jobs', [JobController::class, 'store']);

//edit
Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);

//update
Route::patch('/jobs/{job}', [JobController::class, 'update']);

//destroy
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

//show
Route::get('/jobs/{job}', [JobController::class, 'show']);
