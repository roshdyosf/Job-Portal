<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    public function edit(User $user, Job $job)
    {
        return $job->employer->user->is($user);
    }
    public function create(User $user)
    {
        return $user->account_type === 'employer';
    }

}
