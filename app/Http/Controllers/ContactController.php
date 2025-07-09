<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function showContact()
    {
        return view('contact');
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
