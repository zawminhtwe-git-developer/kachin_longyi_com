<?php

namespace App\Http\Controllers;

use App\Mail\KachinLongyiMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(){
        $details =[
          'title'=>'Mail from Kachin Longyi Website',
          'body'=>'This is testing for gmail sending in this tutorial',
        ];
        Mail::to("gitdeveloper2@gmail.com")->send(new KachinLongyiMail($details));
        return "Email Sent";
    }
}
