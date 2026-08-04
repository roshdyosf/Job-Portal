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
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');



/*
--------------------------------------------------------------
Job routes
--------------------------------------------------------------
*/

Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create')
    ->middleware('auth');

Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit')
    ->middleware('auth')
    ->can('edit-job', 'job');

Route::patch('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update')
    ->middleware('auth')
    ->can('edit-job', 'job');

Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy')
    ->middleware('auth')
    ->can('edit-job', 'job');
