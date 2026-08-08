# New Application Received

Applicant Name: {{ $application->user->name }}
Applicant Email: {{ $application->user->email }}
Applied For Position: {{ $application->job->title }}

@component('mail::button', ['url' => config('app.url')])
View Application Details
@endcomponent