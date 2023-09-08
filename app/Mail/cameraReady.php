<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class cameraReady extends Mailable
{
    use Queueable, SerializesModels;
    public $submissionCode;

    /**
     * Create a new message instance.
     *
     * @param string $submissionCode
     * @return void
     */
    public function __construct()
    {
        //

    }

    public function setSubmissionCode($submissionCode)
    {
        $this->submissionCode = $submissionCode;

        return $this;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Camera Ready',
        );
    }

    public function build(){
        return $this->view('emails.camera_ready.camera_ready')
            ->subject('LIS-CLICK Submission Status Notification')
            ->with([
                'submission' => $this->submissionCode,
            ]);
            // ->attach(public_path('images/Logo1 (1).jpg'), [
            //     'as' => 'Logo.jpg',
            //     'mime' => 'image/jpeg',
            // ]);
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.camera_ready.camera_ready',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
