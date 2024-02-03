<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('/');
    }

    public function submitForm(Request $request)
    {
        // dd($request);
        // Validate the form data
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Send the email
        Mail::to('lama.nazzal23@gmail.com')->send(new ContactFormMail(
            $request->input('name'),
            $request->input('phone'),
            $request->input('email'),
            $request->input('message')
        ));

        // Optionally, you can flash a message to the user or do any other actions
        // ...

        return redirect()->route('contact.show')->with('success', 'Your message has been sent!');
    }
}
