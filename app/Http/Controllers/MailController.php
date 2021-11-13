<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //

    public function form()
    {
        return view('mail.index');
    }

    public function sendMail(Request $request)
    {
        $request->validate([
            'subject' => 'required|max:12',
            'title' => 'required|max:20',
            'content' => 'required|max:100'
        ]);

        //Preparing to send mail
        $data = [
            'title' => $request->title,
            'content' => $request->content
        ];

        Mail::send( 'mail.template.app', $data, function($send){
            $send->to('travis111.dev@gmail.com', 'Travis')->subject('Test Subject');
        });

        $status = 1;
        return view('mail.index', compact('status'));
    }
}
