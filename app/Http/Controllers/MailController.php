<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use App\Mail\ContactMail;

class MailController extends Controller
{

    /*
        Sending mail is tested with Gmail account using the Google SMTP
        https://medium.com/@akhmadshaleh/sending-email-with-laravel-10-and-gmail-49be01c2bc8f
    */
    public function index(Request $request)
    {

        if (is_null($request->name)) {
            return redirect()->route('home.index')->with('message', "Please state Your Name in the contact form.");
        };

        if (is_null($request->email) && is_null($request->phone)) {
            return redirect()->route('home.index')->with('message', "Please input email or phone so I can have something to contact You back.");
        };

        if (is_null($request->message)) {
            return redirect()->route('home.index')->with('message', "How am I supposed to know what You need if You do not tell me?.");
        };

        
        Mail::to('matej.brnic@gmail.com')->send(new ContactMail([
            'message' => $request->message,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]));

        return redirect()->route('home.index')->with('message', "Message received. Talk to You soon. :D");
        
    }
}
