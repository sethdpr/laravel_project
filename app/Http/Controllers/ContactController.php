<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $details = [
            'email' => $request->email,
            'message' => $request->message
        ];

        Mail::to('admin@example.com')->send(new \App\Mail\ContactMail($details));

        return back()->with('status', 'Your message has been sent!');
    }
}
