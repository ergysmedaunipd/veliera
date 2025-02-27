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
        //get all publications sorted by latest created ad
        $publications = Publication::latest()->get();
        return view('publications' , compact('contact','publications'));
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
            'title_sq' => 'required|string|max:255',
            'description' => 'required|string',
            'description_sq' => 'required|string',
            'cover_photo' => 'required|image|max:2048',
            'files.*' => 'nullable|mimes:pdf,doc,docx,txt,jpg,jpeg,png,gif,mp4,avi,mov,mp3,wav|max:10240',
            ]);

        if ($request->hasFile('cover_photo')) {
            $validated['cover_photo'] = $request->file('cover_photo')->store('images', 'public');
        }

        $publication = new Publication();
        $publication->setTranslations('title', ['en' => $request->title, 'sq' => $request->title_sq]);
        $publication->setTranslations('description', ['en' => $request->description, 'sq' => $request->description_sq]);
        $publication->cover_photo = $validated['cover_photo'];
        $publication->save();

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filePath = $file->store('files', 'public');
                $publication->files()->create(['file_path' => $filePath]);
            }
        }

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
            'title_sq' => 'required|string|max:255',
            'description' => 'required|string',
            'description_sq' => 'required|string',
            'cover_photo' => 'nullable|image|max:2048',
            'files.*' => 'nullable|mimes:pdf,doc,docx,txt,jpg,jpeg,png,gif,mp4,avi,mov,mp3,wav|max:10240',
            ]);

        if ($request->hasFile('cover_photo')) {
            if ($publication->cover_photo) {
                Storage::delete($publication->cover_photo);
            }
            $validated['cover_photo'] = $request->file('cover_photo')->store('images', 'public');
        }

        $publication->setTranslations('title', ['en' => $request->title, 'sq' => $request->title_sq]);
        $publication->setTranslations('description', ['en' => $request->description, 'sq' => $request->description_sq]);
        $publication->cover_photo = $validated['cover_photo'] ?? $publication->cover_photo;

        $publication->save();
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filePath = $file->store('files', 'public');
                $publication->files()->create(['file_path' => $filePath]);
            }
        }

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
