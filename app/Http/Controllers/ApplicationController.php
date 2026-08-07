<?php

namespace App\Http\Controllers;
use App\Http\Requests\ApplyToJobRequest;
use App\Models\Job;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function store(ApplyToJobRequest $request, Job $job)
    {
        $cvPath = $request->file('cv')->store('cvs', 'local');
        $application = Application::create([
            'job_id' => $job->id,
            'user_id' => auth()->user()->id,
            'cv_path' => $cvPath,

        ]);
        SendCvToEmployerJob::dispatch($application);
        return response()->json([
            'message' => 'Your application has been submitted successfully.'
        ], 201);
    }
}
