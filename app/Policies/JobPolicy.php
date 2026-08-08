<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;

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
    public function apply(User $user)
    {
        return $user->account_type === 'employee';
    }

}
