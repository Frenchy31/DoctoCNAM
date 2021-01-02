<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MeetingResume extends Mailable
{
    use Queueable, SerializesModels;

    private $meetingId;
    /**
     * Create a new message instance.
     *
     * @param $meetingId
     */
    public function __construct($meetingId)
    {
        $this->meetingId = $meetingId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.meeting-resume')
          ->attach(storage_path('app/temp/pdfs/') .  'Recap-RDV-' . $this->meetingId . '.pdf' );
    }
}
