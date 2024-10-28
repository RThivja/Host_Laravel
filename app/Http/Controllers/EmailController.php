<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        try {
            // Set the recipient email to thivjar.pineappleai@gmail.com
            $recipientEmail = 'thivjar.pineappleai@gmail.com';

            Mail::to($recipientEmail)->send(new ContactMail(
                $request->name,
                $request->email, // User's email (for reference in the message)
                $request->message
            ));

            return response()->json(['message' => 'Email sent successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to send email', 'error' => $e->getMessage()], 500);
        }
    }
}
