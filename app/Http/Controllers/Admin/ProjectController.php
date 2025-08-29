<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (isset($request->is_active) && $request->is_active == 'on') {
            $request['is_active'] = true;
        }
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'project_url' => 'nullable|url',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $validated['is_active'] = $request->has('is_active');

        $project = Project::create($validated);

        if ($request->hasFile('image')) {
            $project->addMediaFromRequest('image')
                ->toMediaCollection('projects');
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {

        // dd($request->all());
        if ( isset($request->is_active) && $request->is_active == 'on') {
            $request['is_active'] = true;
        }

        // dd($request->all());
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'project_url' => 'nullable|url',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $validated['is_active'] = $request->has('is_active');

        $project->update($validated);

        if ($request->hasFile('image')) {
            // Delete old media
            $project->clearMediaCollection('projects');

            // Add new media
            $project->addMediaFromRequest('image')
                ->toMediaCollection('projects');
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // Delete associated media
        $project->clearMediaCollection('projects');

        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }
}
