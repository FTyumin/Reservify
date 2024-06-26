<?php

use Illuminate\Mail\Mailable;

class SampleMail extends Mailable
{
    public function build()
    {
        return $this->subject('Sample Email')
                    ->view('emails.sample');
    }
}