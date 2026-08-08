<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use App\Models\Application;
use Illuminate\Mail\Mailables\Headers;

class ApplicationSubmittedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public Application $application)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $jobTitle = $this->application->job?->title ?? 'Position';
        return new Envelope(
            subject: 'New Application for: ' . $jobTitle,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.application',
        );
    }
    public function headers(): Headers
    {
        return new Headers(
            text: [
                'X-Application-ID' => (string) $this->application->id,
            ],
        );
    }
    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromPath(Storage::disk('local')->path($this->application->cv_path))
                ->as('CV_' . str_replace(' ', '_', $this->application->user->name) . '.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
