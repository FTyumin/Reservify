<?php

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class SampleMail extends Mailable

{

    // public function envelope():Envelope
    // {
    //     return new Envelope(
    //         subject:'Sample Email',
    //         from: new Address('reservify24@gmail.com', 'Admin')
    //     );
    // }
    public $mailMessage;
    public $subject;
    public function __construct($message, $subject)
    {
        $this->mailMessage=$message;
        $this->subject=$subject;
    }
    public function envelope():Envelope
    {
        return new Envelope(
            subject:$this->subject
        );
    }


    public function content():Content
    {
        return new Content(
            view:'emails.test-email',
        );
    }
}