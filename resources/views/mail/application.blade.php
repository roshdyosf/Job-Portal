@component('mail::message')
# New Application Received

A new candidate has just submitted an application for your job listing.

@component('mail::panel')
**Position:** {{ $application->job?->title ?? 'N/A' }}

**Applicant Name:** {{ $application->user?->first_name . ' ' . $application->user?->last_name }}

**Applicant Email:** {{ $application->user?->email }}
@endcomponent

The candidate's CV is attached to this email as a PDF file for your review.

Thanks,<br>
JOB PORTAL
@endcomponent
