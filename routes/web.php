<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use App\Models\Job;
use App\Jobs\TranslateJob;


Route::get("/translate/{job}", function (Job $job) {

    TranslateJob::dispatch($job);
    return response()->json([
        'message' => 'Translation job queued successfully.'
    ], 202);
});
/*
--------------------------------------------------------------
Home route
--------------------------------------------------------------
*/

Route::get('/', function () {
    $jobs = Job::with('employer')->latest()->take(2)->get();
    return view('home', ['jobs' => $jobs]);
});
/*
--------------------------------------------------------------
Contact route
--------------------------------------------------------------
*/

Route::view('/contact', 'contact');
/*
--------------------------------------------------------------
profile route
--------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // Controller renders the profile page and handles updates and deletion
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
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
    ->middleware('auth')
    ->can('create', Job::class);


Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store')
    ->middleware('auth')
    ->can('create', Job::class);
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');
Route::post('/jobs/{job}/apply', [ApplicationController::class, 'store'])
    ->name('jobs.apply')
    ->middleware('auth');
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit')
    ->middleware('auth')
    ->can('edit', 'job');

Route::patch('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update')
    ->middleware('auth')
    ->can('edit', 'job');

Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy')
    ->middleware('auth')
    ->can('edit', 'job');
