<?php

namespace App\Http\Controllers;

use App\Models\CoreValue;
use Illuminate\Http\Request;

class CoreValueController extends Controller
{
    // List all core values
    public function index()
    {
        $coreValues = CoreValue::all();
        return view('home.modify.index', compact('coreValues'));
    }

    // Show the form for creating a new core value
    public function create()
    {
        return view('core-values.create');
    }

    // Store a new core value in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_sq' => 'required|string|max:255',
            'icon' => 'required|string|max:50',
            'description' => 'required|string',
            'description_sq' => 'required|string',
        ]);

        $coreValue = new CoreValue();
        $coreValue->setTranslations('title', ['en' => $request->title, 'sq' => $request->title_sq]);
        $coreValue->setTranslations('description', ['en' => $request->description, 'sq' => $request->description_sq]);
        $coreValue->icon = $request->icon;

        $coreValue->save();

        return redirect()->route('home.modify.index')->with('success', 'Core value created successfully!');
    }

    // Show the form for editing a core value
    public function edit(CoreValue $coreValue)
    {
        return view('core-values.edit', compact('coreValue'));
    }

    // Update a core value in the database
    public function update(Request $request, CoreValue $coreValue)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_sq' => 'required|string|max:255',
            'icon' => 'required|string|max:50',
            'description' => 'required|string',
            'description_sq' => 'required|string',
        ]);

        $coreValue->setTranslations('title', ['en' => $request->title, 'sq' => $request->title_sq]);
        $coreValue->setTranslations('description', ['en' => $request->description, 'sq' => $request->description_sq]);
        $coreValue->icon = $request->icon;

        $coreValue->save();

        return redirect()->route('home.modify.index')->with('success', 'Core value updated successfully!');
    }

    // Delete a core value from the database
    public function destroy(CoreValue $coreValue)
    {
        $coreValue->delete();

        return redirect()->route('home.modify.index')->with('success', 'Core value deleted successfully!');
    }
}
