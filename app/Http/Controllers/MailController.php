<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message_body' => $request->message,
        ];

        Mail::send('emails.contact', $data, function ($message) use ($request) {
            $message->to('alifarizalgg24@gmail.com')
                    ->subject('Coba Coba')
                    ->from($request->email, $request->name);
        });

        toastr()->timeOut(10000)->closeButton()->addSuccess('message sent successfully');

        return redirect()->back();
    }
}
