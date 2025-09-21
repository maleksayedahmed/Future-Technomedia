<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FactSection;
use Illuminate\Http\Request;

class FactSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $factSections = FactSection::with('facts')->orderBy('order')->get();
        return view('admin.fact-sections.index', compact('factSections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fact-sections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $factSection = FactSection::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'order' => $request->order ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        if ($request->hasFile('background_image')) {
            $factSection->addMediaFromRequest('background_image')->toMediaCollection('background_images');
        }

        return redirect()->route('admin.fact-sections.index')
            ->with('success', 'Fact section created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(FactSection $factSection)
    {
        $factSection->load('facts');
        return view('admin.fact-sections.show', compact('factSection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FactSection $factSection)
    {
        return view('admin.fact-sections.edit', compact('factSection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FactSection $factSection)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $factSection->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'order' => $request->order ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        if ($request->hasFile('background_image')) {
            $factSection->clearMediaCollection('background_images');
            $factSection->addMediaFromRequest('background_image')->toMediaCollection('background_images');
        }

        return redirect()->route('admin.fact-sections.index')
            ->with('success', 'Fact section updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FactSection $factSection)
    {
        $factSection->clearMediaCollection('background_images');
        $factSection->delete();

        return redirect()->route('admin.fact-sections.index')
            ->with('success', 'Fact section deleted successfully.');
    }
}
