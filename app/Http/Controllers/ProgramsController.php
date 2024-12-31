<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ProgramsController extends Controller
{
    public function index()
    {
        $contact = Contact::first(); // Fetch the contact information
        return view('programs', compact('contact'));
    }
}
