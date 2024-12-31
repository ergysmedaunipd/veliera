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
            'message' => 'required|string',
        ]);

        // Assume a single contact record exists
        $contact = Contact::first();

        if (!$contact) {
            $contact = new Contact();
        }

        $contact->updateOrCreate(
            ['id' => $contact->id ?? null],
            $request->only(['email', 'phone', 'address', 'message'])
        );

        return redirect()->back()->with('success', 'Contact information updated successfully.');
    }
}
