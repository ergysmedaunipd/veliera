<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $contact = Contact::first(); // Fetch the contact information
        return view('about', compact('contact'));
    }
}
