<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    // declare a public property to store the mail object
    public $mail;

    // create a new instance of the mailable class with the mail object as a parameter
    public function __construct($mail)
    {
        // assign the mail object to the public property
        $this->mail = $mail;
    }

    // build the message using a view template
    public function build()
    {
        return $this->view('emails.contact');
    }
}

