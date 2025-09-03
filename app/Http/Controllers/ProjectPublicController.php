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
        $brochureMedia = $project->getFirstMedia('brochure');

        $videoUrl = $project->video_url ?: ($videoMedia ? $videoMedia->getUrl() : null);
        $videoMime = $videoMedia ? $videoMedia->mime_type : null;

        // Detect YouTube/Vimeo embed URLs if a remote URL is provided
        $videoEmbedUrl = null;
        if ($project->video_url) {
            $url = $project->video_url;
            if (preg_match('~(youtube\.com|youtu\.be)~i', $url)) {
                // Convert to embeddable URL
                if (preg_match('~youtu\.be/([^?&]+)~', $url, $m)) {
                    $videoEmbedUrl = 'https://www.youtube.com/embed/' . $m[1];
                } elseif (preg_match('~v=([^&]+)~', $url, $m)) {
                    $videoEmbedUrl = 'https://www.youtube.com/embed/' . $m[1];
                }
            } elseif (preg_match('~vimeo\.com/(\d+)~i', $url, $m)) {
                $videoEmbedUrl = 'https://player.vimeo.com/video/' . $m[1];
            }
        }
        $brochureAvailable = (bool) $brochureMedia;

        return view('user.project-show', [
            'project' => $project,
            'galleryImages' => $galleryImages,
            'videoUrl' => $videoUrl,
            'videoMime' => $videoMime,
            'videoEmbedUrl' => $videoEmbedUrl,
            'brochureAvailable' => $brochureAvailable,
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


