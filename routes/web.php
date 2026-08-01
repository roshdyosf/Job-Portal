<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

//home
Route::get('/', function () {
    return view('home');


});



//contact
Route::get('/contact', function () {
    return view('contact');
});
//______________________________________________________________

//job routes

//list all
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(3);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

//create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

//store
Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'max:255', 'min:3'],
        'salary' => ['required', 'max:255', 'min:2'],
    ]);
    Job::create(['title' => request('title'), 'salary' => request('salary'), 'employer_id' => 1]);
    return redirect('/jobs');
});



//edit
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::findOrFail($id);
    return view('jobs.edit', ['job' => $job]);

});

//update
Route::patch('/jobs/{id}', function ($id) {

    //authorization ignored for now
    request()->validate([
        'title' => ['required', 'max:255', 'min:3'],
        'salary' => ['required', 'max:255', 'min:2'],
    ]);

    Job::findOrFail($id)->update([
        'title' => request('title'),
        'salary' => request('salary')
    ]);

    return redirect('jobs/' . $id);

});
Route::delete('/jobs/{id}', function ($id) {

    //authorization ignored for now
    Job::findOrFail($id)->delete();

    return redirect('/jobs');

});


//show
Route::get('/jobs/{id}', function ($id) {
    $job = Job::findOrFail($id);
    return view('jobs.show', ['job' => $job]);

});
