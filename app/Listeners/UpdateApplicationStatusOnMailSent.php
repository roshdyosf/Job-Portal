<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Mail\Events\MessageSent;
use App\Models\Application;
class UpdateApplicationStatusOnMailSent
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(MessageSent $event): void
    {

        $headers = $event->message->getHeaders();
        if ($headers->has('X-Application-ID')) {
            $applicationId = $headers->get('X-Application-ID')->getBodyAsString();

            Application::where('id', $applicationId)->update([
                'is_sent' => true,
            ]);
        }
    }
}
