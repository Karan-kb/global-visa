<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactAdmin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact)
    {
        $this->contact=$contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //dd('hello');
        $address=$this->contact['email'];
        $name=$this->contact['name'];
        $subject=$this->contact['subject'];
        return $this->view('emails.contactAdmin')
	                  ->from($address, $name)
                      ->subject($subject)
                      ->with('contact',$this->contact);
    }
    
}
