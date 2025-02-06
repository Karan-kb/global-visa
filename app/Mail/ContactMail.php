<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $full_name;

    public $company_name;

    public $company_logo;

    /**
     * Create a new message instance.
     */
    public function __construct($full_name, $company_name, $company_logo)
    {
        $this->full_name = $full_name;
        $this->company_name = $company_name;
        $this->company_logo = $company_logo;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        
        return $this->subject('Email')
            ->view('emails.user');
    }
    /**
     * Get the message content definition.
     */

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
   
}
