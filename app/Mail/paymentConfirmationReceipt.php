<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class paymentConfirmationReceipt extends Mailable
{
    use Queueable, SerializesModels;
    public $paymentDetails,$submissionCode,$date;
    /**
     * Create a new message instance.
     */
    public function __construct($submissionCode,$paymentDetails,$date)
    {
        //
        $this->paymentDetails = $paymentDetails;
        $this->submissionCode = $submissionCode;
        $this->date = $date;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Payment Confirmation Receipt',
        );
    }

    public function build()
    {
        return $this->view('emails.paymentConfirmationReceipt.paymentConfirmationReceipt')
            ->subject('LIS Payment Confirmation Receipt')
            ->with([
                'paymentDetails' => $this->paymentDetails,
                'submissionCode' => $this->submissionCode,
                'date' => $this->date,
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
            view: 'emails.paymentConfirmationReceipt.paymentConfirmationReceipt',
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
