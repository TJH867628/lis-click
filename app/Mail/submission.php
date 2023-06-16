<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class submission extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $submissionCode;

    /**
     * Create a new message instance.
     *
     * @param int $submissionCode
     * @return void
     */
    public function __construct()
    {

    }

    public function setSubmissionCode($submissionCode)
    {
        $this->submissionCode = $submissionCode;

        return $this;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.submission')
            ->subject('LIS-CLICK')
            ->with([
                'submission' => $this->submissionCode,
            ]);
    }
}

