<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramsController extends Controller
{
    public function landingIndex()
    {
        $contact = Contact::first(); // Fetch the contact information
        $programs = Program::latest()->get();
        return view('programs', compact('contact', 'programs'));
    }
    public function show($id)
    {
        $program = Program::findOrFail($id);
        $contact = Contact::first(); // Fetch the contact information
        return view('programs.show', compact('program','contact'));
    }


    public function index()
    {
        $programs = Program::all();
        return view('programs.index', compact('programs'));
    }

    public function create()
    {
        return view('programs.create');
    }

    public function store(Request $request)
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
            $validated['cover_photo'] = $request->file('cover_photo')->store('images', 'public');
        }
        $program = new Program();

        $program->setTranslations('title', ['en' => $request->title, 'sq' => $request->title_sq]);
        $program->setTranslations('description', ['en' => $request->description, 'sq' => $request->description_sq]);
        $program->cover_photo = $validated['cover_photo'] ?? $program->cover_photo;

        $program->save();

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filePath = $file->store('files', 'public');
                $program->files()->create(['file_path' => $filePath]);
            }
        }

        return redirect()->route('programs.index')->with('success', 'Program created successfully.');
    }

    public function edit(Program $program)
    {
        return view('programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
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
            if ($program->cover_photo) {
                Storage::delete($program->cover_photo);
            }
            $validated['cover_photo'] = $request->file('cover_photo')->store('images', 'public');
        }

        $program->setTranslations('title', ['en' => $request->title, 'sq' => $request->title_sq]);
        $program->setTranslations('description', ['en' => $request->description, 'sq' => $request->description_sq]);
        $program->cover_photo = $validated['cover_photo'] ?? $program->cover_photo;
        $program->save();

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filePath = $file->store('files', 'public');
                $program->files()->create(['file_path' => $filePath]);
            }
        }

        return redirect()->route('programs.index')->with('success', 'Program updated successfully.');
    }

    public function destroy(Program $program)
    {
        if ($program->cover_photo) {
            Storage::delete($program->cover_photo);
        }

        if ($program->file) {
            Storage::delete($program->file);
        }

        $program->delete();

        return redirect()->route('programs.index')->with('success', 'Program deleted successfully.');
    }
}
