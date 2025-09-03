<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class ProjectPublicController extends Controller
{
    /**
     * Display the specified project details page.
     */
    public function show(Project $project)
    {
        // Media collections naming conventions
        $galleryImages = $project->getMedia('projects');
        $videoMedia = $project->getFirstMedia('videos');
        $brochureMedia = $project->getFirstMedia('brochure');

        $videoUrl = $videoMedia ? $videoMedia->getUrl() : asset('video/1.mp4');
        $brochureAvailable = (bool) $brochureMedia;

        // Features per project are not modeled yet; show fallback derived from description
        $derivedFeatures = collect(
            preg_split(
                '/[\r\n]+|[\x{2022}\x{2023}\x{25E6}\x{2043}\x{2219}]|[.;]+/u',
                (string) $project->description,
                -1,
                PREG_SPLIT_NO_EMPTY
            )
        )
            ->map(fn ($line) => trim($line))
            ->filter(fn ($line) => $line !== '')
            ->take(6);

        return view('user.project-show', [
            'project' => $project,
            'galleryImages' => $galleryImages,
            'videoUrl' => $videoUrl,
            'brochureAvailable' => $brochureAvailable,
            'derivedFeatures' => $derivedFeatures,
        ]);
    }

    /**
     * Download the project's brochure if available.
     */
    public function downloadBrochure(Project $project)
    {
        $brochure = $project->getFirstMedia('brochure');
        if (!$brochure) {
            abort(404);
        }

        return Response::download($brochure->getPath(), $brochure->file_name);
    }

    /**
     * Handle demo request submissions.
     */
    public function requestDemo(Project $project, Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'message' => 'nullable|string|max:2000',
        ]);

        // For now, log the request. Hook up mail later if needed.
        Log::info('Demo request received', [
            'project_id' => $project->id,
            'project_title' => $project->title,
            'payload' => $data,
        ]);

        // Optionally, you can email to contact email if configured later.
        $contactEmail = Setting::get('contact_email');
        if (!$contactEmail) {
            // No email configured, just continue.
        }

        return back()->with('status', __('Your demo request has been submitted successfully.'));
    }
}


