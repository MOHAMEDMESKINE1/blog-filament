<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(ContactRequest $request)
    {
        // Validate the incoming request data
       
        // Create a new contact record
         Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);

        // Optionally, you can perform additional actions, such as sending an email or triggering an event

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your message has been submitted successfully!');
    }
}
