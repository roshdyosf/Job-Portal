@component('mail::message')
# New Application Received

A new candidate has just submitted an application for your listing.

@component('mail::panel')
**Position:** {{ $application->job->title }}

**Applicant Name:** {{ $application->user->first_name . ' ' . $application->user->last_name }}

**Applicant Email:** {{ $application->user->email }}
@endcomponent

A candidate's CV is attached and can also be opened directly from the button below.

@component('mail::button', ['url' => $cvUrl])
View Applicant CV
@endcomponent

If the button does not work, copy and paste this link into your browser:

{{ $cvUrl }}

Thanks,
{{ config('app.name') }} Team
@endcomponent
