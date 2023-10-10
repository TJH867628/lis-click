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
    public $paymentDetails,$submissionInfo,$date,$userName;
    /**
     * Create a new message instance.
     */
    public function __construct($submissionInfo,$paymentDetails,$date,$userName)
    {
        //
        $this->paymentDetails = $paymentDetails;
        $this->submissionInfo = $submissionInfo;
        $this->date = $date;
        $this->userName = $userName;
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
                'submissionCode' => $this->submissionInfo,
                'date' => $this->date,
                'userName' => $this->userName,
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
