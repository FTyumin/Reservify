<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyTestEmail;
use Illuminate\Contracts\Mail\Mailable;
use SampleMail;
use App\Mail\WelcomeEmail;	

class EmailController extends Controller
{
    // public function sendWelcomeEmail()
    // {
    //     $toEmail='feodor.tjumin.28@gmail.com';
    //     $Mailmessage='This is a test email';
    //     $subject='Payment Confirmation';

    //     $response=Mail::to($toEmail)->send(new WelcomeEmail($Mailmessage, $subject)); 

    //     dd($response);
    // }
}
