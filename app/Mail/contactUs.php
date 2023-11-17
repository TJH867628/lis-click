<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class contactUs extends Mailable
{
    use Queueable, SerializesModels;

    public $name,$userEmail,$subject,$userMessage;
    /**
     * Create a new message instance.
     * @param string $name
     * @param string $userEmail
     * @param string $subject
     * @param string $userMessage
     */

    public function __construct($name,$userEmail,$subject,$userMessage)
    {
        $this->name = $name;
        $this->userEmail = $userEmail;
        $this->subject = $subject;
        $this->userMessage = (string) $userMessage;

    }


    public function build()
    {
        return $this->from($this->userEmail, $this->name)
            ->view('emails.faq.faq')
            ->subject($this->subject)
            ->with([
                'name' => $this->name,
                'userEmail' => $this->userEmail,
                'subject' => $this->subject,
                'userMessage' => $this->userMessage,
            ]);
            // ->attach(public_path('images/Logo1 (1).jpg'), [
            //     'as' => 'Logo.jpg',
            //     'mime' => 'image/jpeg',
            // ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.faq.faq',
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
