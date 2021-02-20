<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send() {
        return view('contact');
    }

    public function store() {
        request()->validate(['email' => 'required|email']);

        // Mail::raw("It works", function ($msg){
        //     $msg->to(request('email'))->subject("Hello There!!!");
        // });

        Mail::to(request('email'))
                ->send(new Contact());

        return redirect('/contact')->with('msg', 'Email Sent.');

    }



}
