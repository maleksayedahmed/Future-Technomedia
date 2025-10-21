<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the blogs.
     */
    public function index(Request $request)
    {
        $query = Blog::with(['author', 'categories', 'tags']);

        // Filter by status
        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        // Filter by category
        if ($request->has('category') && $request->category !== '') {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('blog_categories.id', $request->category);
            });
        }

        // Search by title
        if ($request->has('search') && $request->search !== '') {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $blogs = $query->orderBy('created_at', 'desc')->paginate(15);
        $categories = BlogCategory::active()->ordered()->get();

        return view('admin.blogs.index', compact('blogs', 'categories'));
    }

    /**
     * Show the form for creating a new blog.
     */
    public function create()
    {
        $categories = BlogCategory::active()->ordered()->get();
        $tags = BlogTag::active()->get();

        return view('admin.blogs.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created blog in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published,archived',
            'published_at' => 'nullable|date',
            'is_featured' => 'boolean',
            'categories' => 'array',
            'categories.*' => 'exists:blog_categories,id',
            'tags' => 'array',
            'tags.*' => 'exists:blog_tags,id',
        ]);

        // Handle slug generation
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle published_at
        if ($validated['status'] === 'published' && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('blogs', 'public');
        }

        $validated['author_id'] = auth()->id();

        $blog = Blog::create($validated);

        // Attach categories and tags
        if (isset($validated['categories'])) {
            $blog->categories()->attach($validated['categories']);
        }

        if (isset($validated['tags'])) {
            $blog->tags()->attach($validated['tags']);
        }

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog post created successfully.');
    }

    /**
     * Display the specified blog.
     */
    public function show(Blog $blog)
    {
        $blog->load(['author', 'categories', 'tags']);

        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified blog.
     */
    public function edit(Blog $blog)
    {
        $blog->load(['categories', 'tags']);
        $categories = BlogCategory::active()->ordered()->get();
        $tags = BlogTag::active()->get();

        return view('admin.blogs.edit', compact('blog', 'categories', 'tags'));
    }

    /**
     * Update the specified blog in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug,' . $blog->id,
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published,archived',
            'published_at' => 'nullable|date',
            'is_featured' => 'boolean',
            'categories' => 'array',
            'categories.*' => 'exists:blog_categories,id',
            'tags' => 'array',
            'tags.*' => 'exists:blog_tags,id',
        ]);

        // Handle slug generation
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle published_at
        if ($validated['status'] === 'published' && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($blog->featured_image && Storage::disk('public')->exists($blog->featured_image)) {
                Storage::disk('public')->delete($blog->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('blogs', 'public');
        }

        $blog->update($validated);

        // Sync categories and tags
        $blog->categories()->sync($validated['categories'] ?? []);
        $blog->tags()->sync($validated['tags'] ?? []);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog post updated successfully.');
    }

    /**
     * Remove the specified blog from storage.
     */
    public function destroy(Blog $blog)
    {
        // Delete featured image if exists
        if ($blog->featured_image && Storage::disk('public')->exists($blog->featured_image)) {
            Storage::disk('public')->delete($blog->featured_image);
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog post deleted successfully.');
    }

    /**
     * Toggle the featured status of a blog post.
     */
    public function toggleFeatured(Blog $blog)
    {
        $blog->update(['is_featured' => !$blog->is_featured]);

        $status = $blog->is_featured ? 'featured' : 'unfeatured';

        return response()->json([
            'success' => true,
            'message' => "Blog post {$status} successfully.",
            'is_featured' => $blog->is_featured
        ]);
    }

    /**
     * Change the status of a blog post.
     */
    public function changeStatus(Request $request, Blog $blog)
    {
        $request->validate([
            'status' => 'required|in:draft,published,archived'
        ]);

        $blog->update([
            'status' => $request->status,
            'published_at' => $request->status === 'published' && !$blog->published_at ? now() : $blog->published_at
        ]);

        return response()->json([
            'success' => true,
            'message' => "Blog status changed to {$request->status}."
        ]);
    }
}
