<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogsPageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogsPageContentController extends Controller
{
    /**
     * Show the form for editing the blogs page content.
     */
    public function edit()
    {
        $content = BlogsPageContent::getContent();

        return view('admin.blogs-page-content.edit', compact('content'));
    }

    /**
     * Update the blogs page content in storage.
     */
    public function update(Request $request)
    {
        $content = BlogsPageContent::getContent();

        $validated = $request->validate([
            'hero_title' => 'required|string|max:255',
            'hero_description' => 'nullable|string|max:1000',
            'hero_subtitle' => 'required|string|max:255',
            'hero_background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hero_scroll_text' => 'required|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string|max:255',
            'is_active' => 'boolean'
        ]);

        // Handle background image upload
        if ($request->hasFile('hero_background_image')) {
            // Delete old image if exists
            if ($content->hero_background_image && Storage::disk('public')->exists($content->hero_background_image)) {
                Storage::disk('public')->delete($content->hero_background_image);
            }
            $validated['hero_background_image'] = $request->file('hero_background_image')->store('blogs-page', 'public');
        }

        $content->update($validated);

        return redirect()->route('admin.blogs-page-content.edit')
            ->with('success', 'Blogs page content updated successfully.');
    }
}
