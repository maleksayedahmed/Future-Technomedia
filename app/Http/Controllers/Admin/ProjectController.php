<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use App\Models\ProjectFeature;
use App\Models\ProjectTechStack;
use App\Models\ProjectPricingPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

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
    public function store(StoreProjectRequest $request)
    {
        try {
            DB::beginTransaction();

            // Create the project
            $projectData = $request->only([
                'title', 'description', 'project_category', 'live_url', 'github_url',
                'video_url', 'pricing_type', 'fixed_price', 'discount_amount', 
                'discount_type', 'order'
            ]);
            
            $projectData['is_active'] = $request->has('is_active');
            
            $project = Project::create($projectData);

            // Handle PDF upload
            if ($request->hasFile('pdf_file')) {
                $pdfPath = $request->file('pdf_file')->store('projects/pdfs', 'public');
                $project->update(['pdf_file' => $pdfPath]);
            }

            // Handle gallery images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $project->addMedia($image)->toMediaCollection('gallery');
                }
            }

            // Handle main project image (backward compatibility)
            if ($request->hasFile('image')) {
                $project->addMediaFromRequest('image')->toMediaCollection('projects');
            }

            // Create project features
            if ($request->has('features')) {
                foreach ($request->features as $index => $featureData) {
                    if (!empty($featureData['title'])) {
                        ProjectFeature::create([
                            'project_id' => $project->id,
                            'icon' => $featureData['icon'],
                            'title' => $featureData['title'],
                            'description' => $featureData['description'],
                            'order' => $index
                        ]);
                    }
                }
            }

            // Create tech stacks
            if ($request->has('tech_stacks')) {
                foreach ($request->tech_stacks as $index => $techData) {
                    if (!empty($techData['technology'])) {
                        ProjectTechStack::create([
                            'project_id' => $project->id,
                            'parent_category' => $techData['parent_category'],
                            'technology' => $techData['technology'],
                            'icon' => $techData['icon'] ?? null,
                            'order' => $index
                        ]);
                    }
                }
            }

            // Create pricing plans
            if ($request->has('pricing_plans') && $request->pricing_type === 'plans') {
                foreach ($request->pricing_plans as $index => $planData) {
                    if (!empty($planData['title'])) {
                        ProjectPricingPlan::create([
                            'project_id' => $project->id,
                            'title' => $planData['title'],
                            'subtitle' => $planData['subtitle'] ?? null,
                            'price' => $planData['price'],
                            'features' => $planData['features'] ?? [],
                            'is_popular' => isset($planData['is_popular']) && $planData['is_popular'],
                            'order' => $index
                        ]);
                    }
                }
            }

            DB::commit();

            return redirect()->route('admin.projects.index')
                ->with('success', 'Project created successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors(['error' => 'Failed to create project: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project->load(['features', 'techStacks', 'pricingPlans']);
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $project->load(['features', 'techStacks', 'pricingPlans']);
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProjectRequest $request, Project $project)
    {
        try {
            DB::beginTransaction();

            // Update project data
            $projectData = $request->only([
                'title', 'description', 'project_category', 'live_url', 'github_url',
                'video_url', 'pricing_type', 'fixed_price', 'discount_amount', 
                'discount_type', 'order'
            ]);
            
            $projectData['is_active'] = $request->has('is_active');
            
            $project->update($projectData);

            // Handle PDF upload
            if ($request->hasFile('pdf_file')) {
                // Delete old PDF if exists
                if ($project->pdf_file) {
                    Storage::disk('public')->delete($project->pdf_file);
                }
                $pdfPath = $request->file('pdf_file')->store('projects/pdfs', 'public');
                $project->update(['pdf_file' => $pdfPath]);
            }

            // Handle gallery images
            if ($request->hasFile('images')) {
                // Clear existing gallery
                $project->clearMediaCollection('gallery');
                foreach ($request->file('images') as $image) {
                    $project->addMedia($image)->toMediaCollection('gallery');
                }
            }

            // Handle main project image
            if ($request->hasFile('image')) {
                $project->clearMediaCollection('projects');
                $project->addMediaFromRequest('image')->toMediaCollection('projects');
            }

            // Update features
            $project->features()->delete();
            if ($request->has('features')) {
                foreach ($request->features as $index => $featureData) {
                    if (!empty($featureData['title'])) {
                        ProjectFeature::create([
                            'project_id' => $project->id,
                            'icon' => $featureData['icon'],
                            'title' => $featureData['title'],
                            'description' => $featureData['description'],
                            'order' => $index
                        ]);
                    }
                }
            }

            // Update tech stacks
            $project->techStacks()->delete();
            if ($request->has('tech_stacks')) {
                foreach ($request->tech_stacks as $index => $techData) {
                    if (!empty($techData['technology'])) {
                        ProjectTechStack::create([
                            'project_id' => $project->id,
                            'parent_category' => $techData['parent_category'],
                            'technology' => $techData['technology'],
                            'icon' => $techData['icon'] ?? null,
                            'order' => $index
                        ]);
                    }
                }
            }

            // Update pricing plans
            $project->pricingPlans()->delete();
            if ($request->has('pricing_plans') && $request->pricing_type === 'plans') {
                foreach ($request->pricing_plans as $index => $planData) {
                    if (!empty($planData['title'])) {
                        ProjectPricingPlan::create([
                            'project_id' => $project->id,
                            'title' => $planData['title'],
                            'subtitle' => $planData['subtitle'] ?? null,
                            'price' => $planData['price'],
                            'features' => $planData['features'] ?? [],
                            'is_popular' => isset($planData['is_popular']) && $planData['is_popular'],
                            'order' => $index
                        ]);
                    }
                }
            }

            DB::commit();

            return redirect()->route('admin.projects.index')
                ->with('success', 'Project updated successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors(['error' => 'Failed to update project: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        try {
            DB::beginTransaction();

            // Delete PDF file if exists
            if ($project->pdf_file) {
                Storage::disk('public')->delete($project->pdf_file);
            }

            // Delete associated media
            $project->clearMediaCollection('projects');
            $project->clearMediaCollection('gallery');

            // Delete related records (will cascade automatically due to foreign key constraints)
            $project->delete();

            DB::commit();

            return redirect()->route('admin.projects.index')
                ->with('success', 'Project deleted successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Failed to delete project: ' . $e->getMessage()]);
        }
    }
}
