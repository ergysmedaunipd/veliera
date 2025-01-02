<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'address_sq' => 'required|string',
            'message' => 'required|string',
            'message_sq' => 'required|string',
        ]);

        // Assume a single contact record exists
        $contact = Contact::first() ?? new Contact();

        $contact->setTranslations('address', ['en' => $request->address, 'sq' => $request->address_sq]);
        $contact->setTranslations('message', ['en' => $request->message, 'sq' => $request->message_sq]);

        $contact->email = $request->email;
        $contact->phone = $request->phone;

        $contact->save();

        return redirect()->back()->with('success', 'Contact information updated successfully.');
    }
}
