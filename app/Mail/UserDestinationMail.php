<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserDestinationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;

    public $company_name;

    public $countryName;

    public $company_logo;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $countryName, $company_name, $company_logo)
    {
        $this->name = $name;
        $this->countryName = $countryName;
        $this->company_name = $company_name;
       
        $this->company_logo = $company_logo;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        
        return $this->subject('Email')
            ->view('emails.userDestination')
            ->with([
                
                'name' => $this->name,
              
                'countryName' => $this->countryName,
                'company_name' => $this->company_name,
                'company_logo' => $this->company_logo,

            ]);
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
