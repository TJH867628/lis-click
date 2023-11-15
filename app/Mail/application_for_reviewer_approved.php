<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class application_for_reviewer_approved extends Mailable
{
    use Queueable, SerializesModels;
    public $username,$password;

    /**
     * Create a new message instance.
     *
     * @param string $username
     * @param string $password
     * @return void
     */
    public function __construct()
    {
        //

    }

    public function setSubmissionInfo($username,$password)
    {
        $this->username = $username;
        $this->password = $password;
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
        return $this->view('emails.application_for_reviewer_approved.application_for_reviewer_approved')
            ->subject('LIS-CLICK Submission Status Notification')
            ->with([
                'username' => $this->username,
                'password' => $this->password,
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
            view: 'emails.application_for_reviewer_approved.application_for_reviewer_approved',
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
