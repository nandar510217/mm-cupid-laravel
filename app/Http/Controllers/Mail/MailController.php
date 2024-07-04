<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Mail\RegistrationConfirmMail;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function index(){
        $mailData = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp.'
        ];
        Mail::to('nandarwin510217@gmail.com')->send(new RegistrationConfirmMail($mailData));
        dd("Email is sent successfully.");    }
}
