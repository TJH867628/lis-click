<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class correction_notification extends Mailable
{
    use Queueable, SerializesModels;
    public $submissionInfo,$participants1Name;

    /**
     * Create a new message instance.
     *
     * @param string $submissionInfo
     * @param string $participants1Name
     * @return void
     */
    public function __construct()
    {
        //

    }

    public function setSubmissionInfo($submissionInfo,$participants1Name)
    {
        $this->submissionInfo = $submissionInfo;
        $this->participants1Name = $participants1Name;
        return $this;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Acceptance of Manuscript for International Conference Liga Ilmu Serantau (LIS)',
        );
    }

    public function build(){
        return $this->view('emails.correction_notification.correction_notification')
            ->subject('LIS-CLICK Submission Status Notification')
            ->with([
                'submissionInfo' => $this->submissionInfo,
                'participants1Name' => $this->participants1Name,
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
            view: 'emails.correction_notification.correction_notification',
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
