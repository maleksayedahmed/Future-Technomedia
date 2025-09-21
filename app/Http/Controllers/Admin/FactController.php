<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fact;
use Illuminate\Http\Request;

class FactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facts = Fact::orderBy('order')->get();
        return view('admin.facts.index', compact('facts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.facts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'number' => 'required|integer|min:0',
            'label' => 'required|string|max:255',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        Fact::create([
            'title' => $request->title,
            'number' => $request->number,
            'label' => $request->label,
            'order' => $request->order ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.facts.index')
            ->with('success', 'Fact created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fact $fact)
    {
        return view('admin.facts.show', compact('fact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fact $fact)
    {
        return view('admin.facts.edit', compact('fact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fact $fact)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'number' => 'required|integer|min:0',
            'label' => 'required|string|max:255',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $fact->update([
            'title' => $request->title,
            'number' => $request->number,
            'label' => $request->label,
            'order' => $request->order ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.facts.index')
            ->with('success', 'Fact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fact $fact)
    {
        $fact->delete();

        return redirect()->route('admin.facts.index')
            ->with('success', 'Fact deleted successfully.');
    }
}
