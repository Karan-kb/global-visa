<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;


class AdminContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $full_name;
    public $email;
    public $subject;
    public $messege;
    public $phone;
    public $company_name;
    public $company_logo;

    /**
     * Create a new message instance.
     */
    public function __construct($full_name, $email,$subject,$messege, $phone , $company_name, $company_logo)
    {
        $this->full_name = $full_name;
        $this->email = $email;
        $this->phone = $phone;
        $this->subject = $subject;
        $this->messege = $messege;
        $this->company_name = $company_name;
        $this->company_logo = $company_logo;
        
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        
        return $this->subject($this->subject)
            ->view('emails.admin');
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
