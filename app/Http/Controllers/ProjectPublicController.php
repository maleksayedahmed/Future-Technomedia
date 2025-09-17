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
        // Load relationships
        $project->load(['features', 'pricingPlans', 'techStacks']);

        // Media collections naming conventions
        $galleryImages = $project->getMedia('gallery');
        if ($galleryImages->isEmpty() && $project->getFirstMedia('projects')) {
            $galleryImages = collect([$project->getFirstMedia('projects')]);
        }
        $videoMedia = $project->getFirstMedia('videos');
        $videoPosterMedia = $project->getFirstMedia('video_poster');
        $brochureMedia = $project->getFirstMedia('brochure');

        $videoUrl = $videoMedia ? $videoMedia->getUrl() : null;
        $videoMime = $videoMedia ? $videoMedia->mime_type : null;
        $videoPosterUrl = $videoPosterMedia
            ? $videoPosterMedia->getUrl()
            : ($galleryImages && $galleryImages->count() > 0 ? $galleryImages->first()->getUrl() : null);

        // Detect YouTube/Vimeo embed URLs if a remote URL is provided
        $videoEmbedUrl = null;
        // No external video URLs; rely on uploaded videos only
        $brochureAvailable = (bool) $brochureMedia;

        return view('user.project-show', [
            'project' => $project,
            'galleryImages' => $galleryImages,
            'videoUrl' => $videoUrl,
            'videoMime' => $videoMime,
            'videoEmbedUrl' => $videoEmbedUrl,
            'brochureAvailable' => $brochureAvailable,
            'videoPosterUrl' => $videoPosterUrl,
        ]);
    }

    /**
     * Display the project's brochure inline for preview.
     */
    public function viewBrochure(Project $project)
    {
        $brochure = $project->getFirstMedia('brochure');
        if (!$brochure) {
            abort(404);
        }

        // Return PDF with headers that force inline display
        return response()->file($brochure->getPath(), [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $brochure->file_name . '"',
        ]);
    }

    /**
     * Show PDF in an embedded viewer page.
     */
    public function previewBrochure(Project $project)
    {
        $brochure = $project->getFirstMedia('brochure');
        if (!$brochure) {
            abort(404);
        }

        $pdfUrl = route('projects.brochure', $project);
        
        return view('user.pdf-preview', [
            'project' => $project,
            'pdfUrl' => $pdfUrl,
            'fileName' => $brochure->file_name
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


