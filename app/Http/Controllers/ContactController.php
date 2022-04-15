<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function send(ContactRequest $request)
    {
        // dd($request->all());
        Mail::send('mails.contact', [
            'name' => $request->name,
            'from' => $request->email,
            // 'subject' => $request->subject,
            'code' => $request->code,
            'msg' => $request->message,
        ], function($mail) use($request) {
            $mail->from(env('MAIL_USERNAME'));
            $mail->to('arman.petrosyan2506@gmail.com')->subject($request->subject);
        });

        return redirect()->back();
    }
}
