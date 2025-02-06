<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;


class AdminDestinationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $subject;
    public $userMessage;
    public $phone;
    public $countryName;
    public $company_name;
    public $company_logo;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $email,$subject,$userMessage, $phone , $company_name, $company_logo, $countryName)
    {
        $this->name = $name;
        $this->email = $email;
       
        $this->subject = $subject;
       
        $this->userMessage = $userMessage;
        $this->phone = $phone;
       
        $this->company_name = $company_name;
        $this->company_logo = $company_logo;
        $this->countryName =$countryName;
        
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        
        return $this->subject($this->subject)
            ->view('emails.adminDestination')
            ->with([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'subject' => $this->subject,
                'userMessage' => $this->userMessage,
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
