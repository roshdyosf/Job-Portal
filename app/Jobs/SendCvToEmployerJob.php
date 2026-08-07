<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendCvToEmployerJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public int $tries = 3;
    public function __construct(Application $application)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->application->load(['jobPost.employer', 'applicant']);

        $employerEmail = $this->application->jobPost->employer->email;

        Mail::to($employerEmail)->send(new ApplicationSubmittedMail($this->application));
    }
}

