<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $contact = Contact::first(); // Fetch the contact information
        $members = Member::all();
        return view('about', compact('contact', 'members'));

    }

    public function aboutIndex()
    {
        // Get non-deleted members
        $members = Member::all();
        return view('about.index', compact('members'));
    }

    // Show the form for creating a new member
    public function create()
    {
        return view('about.create');
    }

    // Store a new member in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'required|string',
            'bio_sq' => 'required|string',
            'picture' => 'required|image',
        ]);

        // Handle file upload
        $validated['picture'] = $request->file('picture')->store('photos', 'public');

        $member = new Member();
        $member->setTranslations('name', ['en' => $request->name, 'sq' => $request->name_sq]);
        $member->setTranslations('bio', ['en' => $request->bio, 'sq' => $request->bio_sq]);
        $member->picture = $validated['picture'];

        $member->save();

        return redirect()->route('members.index')->with('success', 'Member created successfully!');
    }

    // Show the form for editing a member
    public function edit(Member $member)
    {
        return view('about.edit', compact('member'));
    }

    // Update a member in the database
    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'required|string',
            'bio_sq' => 'required|string',
            'picture' => 'nullable|image',
        ]);

        if ($request->hasFile('picture')) {
            // Delete the old photo if exists
            if ($member->picture) {
                Storage::delete('public/' . $member->picture);
            }
            $validated['picture'] = $request->file('picture')->store('photos', 'public');
        }

        $member->setTranslations('name', ['en' => $request->name, 'sq' => $request->name]);
        $member->setTranslations('bio', ['en' => $request->bio, 'sq' => $request->bio_sq]);
        $member->picture = $validated['picture'] ?? $member->picture;

        $member->save();

        return redirect()->route('members.index')->with('success', 'Member updated successfully!');
    }

    // Delete a member from the database
    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('members.index')->with('success', 'Member deleted successfully!');
    }
}
