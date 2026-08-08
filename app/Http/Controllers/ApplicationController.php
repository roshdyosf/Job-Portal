<?php

namespace App\Http\Controllers;
use App\Http\Requests\ApplyToJobRequest;
use App\Models\Job;
use App\Models\Application;
use Illuminate\Support\Facades\Mail;
use \App\Mail\ApplicationSubmittedMail;
class ApplicationController extends Controller
{
    public function store(ApplyToJobRequest $request, Job $job)
    {
        $cvPath = $request->file('cv')->store('cvs', 'local');

        $application = Application::create([
            'job_listing_id' => $job->id,
            'user_id' => auth()->id(),
            'cv_path' => $cvPath,
        ]);

        $application->load(['job', 'user']);

        Mail::to($job->employer->user)
            ->queue(new ApplicationSubmittedMail($application));

        return redirect()
            ->route('jobs.show', $job)
            ->with('success', 'Your application has been submitted successfully.');
    }
}
