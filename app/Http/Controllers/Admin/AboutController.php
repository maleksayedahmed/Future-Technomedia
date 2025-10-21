<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = About::ordered()->get();
        return view('admin.abouts.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'hero_title' => 'nullable|string|max:255',
            'hero_subtitle' => 'nullable|string|max:255',
            'hero_description' => 'nullable|string',
            'services_title' => 'nullable|string|max:255',
            'services_subtitle' => 'nullable|string|max:255',
            'services' => 'nullable|array',
            'video_title' => 'nullable|string|max:255',
            'video_description' => 'nullable|string',
            'video_button_text' => 'nullable|string|max:255',
            'cta_title' => 'nullable|string|max:255',
            'cta_button_text' => 'nullable|string|max:255',
            'cta_button_url' => 'nullable|string|max:255',
            'hero_background' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'video_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'presentation_video' => 'nullable|mimes:mp4,avi,mov,wmv|max:51200', // 50MB max
            'presentation_pdf' => 'nullable|mimes:pdf|max:10240', // 10MB max
            'order' => 'nullable|integer',
        ]);

        $about = About::create([
            'hero_title' => $request->hero_title,
            'hero_subtitle' => $request->hero_subtitle,
            'hero_description' => $request->hero_description,
            'services_title' => $request->services_title,
            'services_subtitle' => $request->services_subtitle,
            'services' => $request->services,
            'video_title' => $request->video_title,
            'video_description' => $request->video_description,
            'video_button_text' => $request->video_button_text,
            'cta_title' => $request->cta_title,
            'cta_button_text' => $request->cta_button_text,
            'cta_button_url' => $request->cta_button_url,
            'is_active' => $request->has('is_active'),
            'order' => $request->order ?? 0,
        ]);

        // Handle file uploads
        if ($request->hasFile('hero_background')) {
            $about->addMediaFromRequest('hero_background')->toMediaCollection('hero_background');
        }

        if ($request->hasFile('video_thumbnail')) {
            $about->addMediaFromRequest('video_thumbnail')->toMediaCollection('video_thumbnail');
        }

        if ($request->hasFile('presentation_video')) {
            $about->addMediaFromRequest('presentation_video')->toMediaCollection('presentation_video');
        }

        if ($request->hasFile('presentation_pdf')) {
            $about->addMediaFromRequest('presentation_pdf')->toMediaCollection('presentation_pdf');
        }

        // Handle service images
        if ($request->has('service_images')) {
            foreach ($request->file('service_images', []) as $index => $file) {
                if ($file) {
                    $about->addMedia($file)->toMediaCollection('service_images');
                }
            }
        }

        return redirect()->route('admin.abouts.index')
            ->with('success', 'About content created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        return view('admin.abouts.show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('admin.abouts.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'hero_title' => 'nullable|string|max:255',
            'hero_subtitle' => 'nullable|string|max:255',
            'hero_description' => 'nullable|string',
            'services_title' => 'nullable|string|max:255',
            'services_subtitle' => 'nullable|string|max:255',
            'services' => 'nullable|array',
            'video_title' => 'nullable|string|max:255',
            'video_description' => 'nullable|string',
            'video_button_text' => 'nullable|string|max:255',
            'cta_title' => 'nullable|string|max:255',
            'cta_button_text' => 'nullable|string|max:255',
            'cta_button_url' => 'nullable|string|max:255',
            'hero_background' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'video_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'presentation_video' => 'nullable|mimes:mp4,avi,mov,wmv|max:51200', // 50MB max
            'presentation_pdf' => 'nullable|mimes:pdf|max:10240', // 10MB max
            'order' => 'nullable|integer',
        ]);

        $about->update([
            'hero_title' => $request->hero_title,
            'hero_subtitle' => $request->hero_subtitle,
            'hero_description' => $request->hero_description,
            'services_title' => $request->services_title,
            'services_subtitle' => $request->services_subtitle,
            'services' => $request->services,
            'video_title' => $request->video_title,
            'video_description' => $request->video_description,
            'video_button_text' => $request->video_button_text,
            'cta_title' => $request->cta_title,
            'cta_button_text' => $request->cta_button_text,
            'cta_button_url' => $request->cta_button_url,
            'is_active' => $request->has('is_active'),
            'order' => $request->order ?? 0,
        ]);

        // Handle file uploads
        if ($request->hasFile('hero_background')) {
            $about->clearMediaCollection('hero_background');
            $about->addMediaFromRequest('hero_background')->toMediaCollection('hero_background');
        }

        if ($request->hasFile('video_thumbnail')) {
            $about->clearMediaCollection('video_thumbnail');
            $about->addMediaFromRequest('video_thumbnail')->toMediaCollection('video_thumbnail');
        }

        if ($request->hasFile('presentation_video')) {
            $about->clearMediaCollection('presentation_video');
            $about->addMediaFromRequest('presentation_video')->toMediaCollection('presentation_video');
        }

        if ($request->hasFile('presentation_pdf')) {
            $about->clearMediaCollection('presentation_pdf');
            $about->addMediaFromRequest('presentation_pdf')->toMediaCollection('presentation_pdf');
        }

        // Handle service images - clear existing and add new ones
        if ($request->hasFile('service_images')) {
            $about->clearMediaCollection('service_images');
            foreach ($request->file('service_images') as $file) {
                $about->addMedia($file)->toMediaCollection('service_images');
            }
        }

        return redirect()->route('admin.abouts.index')
            ->with('success', 'About content updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        // Clear all media collections
        $about->clearMediaCollection('hero_background');
        $about->clearMediaCollection('video_thumbnail');
        $about->clearMediaCollection('presentation_video');
        $about->clearMediaCollection('presentation_pdf');
        $about->clearMediaCollection('service_images');

        $about->delete();

        return redirect()->route('admin.abouts.index')
            ->with('success', 'About content deleted successfully.');
    }
}
