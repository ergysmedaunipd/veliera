<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicationsController extends Controller
{
    public function landingIndex()
    {
        $contact = Contact::first(); // Fetch the contact information
        return view('publications' , compact('contact'));
    }
    public function show($id)
    {
        $publication = Publication::findOrFail($id);
        $contact = Contact::first(); // Fetch the contact information
        return view('publications.show', compact('publication','contact'));
    }


    public function index()
    {
        $publications = Publication::all();
        return view('publications.index', compact('publications'));
    }

    public function create()
    {
        return view('publications.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'cover_photo' => 'nullable|image|max:2048',
            'file' => 'nullable|mimes:pdf,doc,docx,txt|max:10240', // File validation
        ]);

        if ($request->hasFile('cover_photo')) {
            $validated['cover_photo'] = $request->file('cover_photo')->store('images', 'public');
        }

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('images', 'public');
        }

        Publication::create($validated);

        return redirect()->route('publications.index')->with('success', 'Publication created successfully.');
    }

    public function edit(Publication $publication)
    {
        return view('publications.edit', compact('publication'));
    }

    public function update(Request $request, Publication $publication)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'cover_photo' => 'nullable|image|max:2048',
            'file' => 'nullable|mimes:pdf,doc,docx,txt|max:10240',
        ]);

        if ($request->hasFile('cover_photo')) {
            if ($publication->cover_photo) {
                Storage::delete($publication->cover_photo);
            }
            $validated['cover_photo'] = $request->file('cover_photo')->store('images', 'public');
        }

        if ($request->hasFile('file')) {
            if ($publication->file) {
                Storage::delete($publication->file);
            }
            $validated['file'] = $request->file('file')->store('images', 'public');
        }

        $publication->update($validated);

        return redirect()->route('publications.index')->with('success', 'Publication updated successfully.');
    }

    public function destroy(Publication $publication)
    {
        if ($publication->cover_photo) {
            Storage::delete($publication->cover_photo);
        }

        if ($publication->file) {
            Storage::delete($publication->file);
        }

        $publication->delete();

        return redirect()->route('publications.index')->with('success', 'Publication deleted successfully.');
    }
}
