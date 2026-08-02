<?php

namespace App\Http\Controllers;

use App\Models\Job;

class JobController extends Controller
{

    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(3);
        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'max:255', 'min:3'],
            'salary' => ['required', 'max:255', 'min:2'],
        ]);
        Job::create(['title' => request('title'), 'salary' => request('salary'), 'employer_id' => 1]);
        return redirect('/jobs');

    }

    public function edit(Job $job)
    {

        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        //authorization ignored for now
        request()->validate([
            'title' => ['required', 'max:255', 'min:3'],
            'salary' => ['required', 'max:255', 'min:2'],
        ]);

        $job->update(['title' => request('title'), 'salary' => request('salary')]);

        return redirect('jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/jobs');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }


}
