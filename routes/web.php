<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');


});




Route::get('/contact', function () {
    return view('contact');
});


//list all jobs
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(3);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

//create job
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

//store job
Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'max:255', 'min:3'],
        'salary' => ['required', 'max:255', 'min:2'],
    ]);
    Job::create(['title' => request('title'), 'salary' => request('salary'), 'employer_id' => 1]);
    return redirect('/jobs');
});

//show job
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);

});

//edit job
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);
    return view('jobs.edit', ['job' => $job]);

});
Route::patch('/jobs/{id}', function ($id) {

    dd(request()->all());

});



