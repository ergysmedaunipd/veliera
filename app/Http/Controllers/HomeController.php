<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Contact;
use App\Models\CoreValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    // List all banners
    public function index()
    {
        $banners = Banner::all();
        $coreValues = CoreValue::all(); // Add this to get the core values
        $contact = Contact::first(); // Add this to get the contact information
        return view('home.modify', compact('banners', 'coreValues','contact')); // Pass both to the view
    }


    // Show the form for creating a new banner
    public function create()
    {
        // Check if a banner already exists
        $existingBanner = Banner::first(); // Assuming you only allow one banner to be created
        if ($existingBanner) {
            return redirect()->route('home.modify.index')->with('error', 'A banner already exists!');
        }

        return view('home.create');
    }

    // Store a new banner in the database
    public function store(Request $request)
    {
        $existingBanner = Banner::first(); // Assuming you only allow one banner
        if ($existingBanner) {
            return redirect()->route('home.modify.index')->with('error', 'A banner already exists!');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string',
            'side_image' => 'required|image',
            'top_image' => 'required|image',
        ]);

        // Handle file uploads
        $validated['side_image'] = $request->file('side_image')->store('images', 'public');
        $validated['top_image'] = $request->file('top_image')->store('images', 'public');

        Banner::create($validated);

        return redirect()->route('home.modify.index')->with('success', 'Banner created successfully!');
    }

    // Show the form for editing a banner
    public function edit(Banner $banner)
    {
        return view('home.edit', compact('banner'));
    }

    // Update a banner in the database
    public function update(Request $request, Banner $banner)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string',
            'side_image' => 'nullable|image',
            'top_image' => 'nullable|image',
        ]);

        if ($request->hasFile('side_image')) {
            // Delete the old side image if exists
            if ($banner->side_image) {
                Storage::delete('public/' . $banner->side_image);
            }
            $validated['side_image'] = $request->file('side_image')->store('images', 'public');
        }

        if ($request->hasFile('top_image')) {
            // Delete the old top image if exists
            if ($banner->top_image) {
                Storage::delete('public/' . $banner->top_image);
            }
            $validated['top_image'] = $request->file('top_image')->store('images', 'public');
        }

        $banner->update($validated);

        return redirect()->route('home.modify.index')->with('success', 'Banner updated successfully!');
    }

    // Delete a banner from the database
    public function destroy(Banner $banner)
    {
        $banner->delete();

        return redirect()->route('home.modify.index')->with('success', 'Banner deleted successfully!');
    }
}
