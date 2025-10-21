<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\BlogsPageContent;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the blogs.
     */
    public function index(Request $request)
    {
        $query = Blog::with(['author', 'categories', 'tags'])->published();

        // Filter by category
        if ($request->has('category') && $request->category !== '') {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Filter by tag
        if ($request->has('tag') && $request->tag !== '') {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('slug', $request->tag);
            });
        }

        // Search by title or content
        if ($request->has('search') && $request->search !== '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('content', 'like', '%' . $search . '%')
                  ->orWhere('excerpt', 'like', '%' . $search . '%');
            });
        }

        $blogs = $query->orderBy('published_at', 'desc')->paginate(9);

        // Get blogs page content
        $blogsPageContent = BlogsPageContent::getContent();

        // Get featured blogs for sidebar
        $featuredBlogs = Blog::published()->featured()
            ->orderBy('published_at', 'desc')
            ->limit(5)
            ->get();

        // Get recent blogs for sidebar
        $recentBlogs = Blog::published()
            ->orderBy('published_at', 'desc')
            ->limit(5)
            ->get();

        // Get all categories for sidebar
        $categories = BlogCategory::active()
            ->withCount(['blogs' => function ($query) {
                $query->published();
            }])
            ->ordered()
            ->get();

        // Get all tags for sidebar
        $tags = BlogTag::active()
            ->withCount(['blogs' => function ($query) {
                $query->published();
            }])
            ->get();

        return view('user.blog.blogs', compact(
            'blogs',
            'blogsPageContent',
            'featuredBlogs',
            'recentBlogs',
            'categories',
            'tags'
        ));
    }

    /**
     * Display the specified blog.
     */
    public function show($slug)
    {
        $blog = Blog::with(['author', 'categories', 'tags', 'approvedComments.replies'])
            ->where('slug', $slug)
            ->published()
            ->firstOrFail();

        // Increment view count
        $blog->incrementViewCount();

        // Get related blogs (same categories)
        $relatedBlogs = Blog::published()
            ->whereHas('categories', function ($query) use ($blog) {
                $query->whereIn('blog_categories.id', $blog->categories->pluck('id'));
            })
            ->where('id', '!=', $blog->id)
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        // Get featured blogs for sidebar
        $featuredBlogs = Blog::published()->featured()
            ->where('id', '!=', $blog->id)
            ->orderBy('published_at', 'desc')
            ->limit(5)
            ->get();

        // Get recent blogs for sidebar
        $recentBlogs = Blog::published()
            ->where('id', '!=', $blog->id)
            ->orderBy('published_at', 'desc')
            ->limit(5)
            ->get();

        // Get all categories for sidebar
        $categories = BlogCategory::active()
            ->withCount(['blogs' => function ($query) {
                $query->published();
            }])
            ->ordered()
            ->get();

        // Get all tags for sidebar
        $tags = BlogTag::active()
            ->withCount(['blogs' => function ($query) {
                $query->published();
            }])
            ->get();

        return view('user.blog.blog-show', compact(
            'blog',
            'relatedBlogs',
            'featuredBlogs',
            'recentBlogs',
            'categories',
            'tags'
        ));
    }

    /**
     * Store a newly created comment.
     */
    public function storeComment(Request $request, $slug)
    {
        $blog = Blog::where('slug', $slug)->published()->firstOrFail();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'content' => 'required|string|max:2000',
            'parent_id' => 'nullable|exists:comments,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $comment = Comment::create([
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->content,
            'blog_id' => $blog->id,
            'parent_id' => $request->parent_id,
            'status' => 'approved' // Auto-approve for now, can be changed to 'pending' for moderation
        ]);

        // Update comment count
        $blog->increment('comment_count');

        // Load the comment with relationships for the response
        $comment->load('replies');

        return response()->json([
            'success' => true,
            'message' => 'Comment posted successfully!',
            'comment' => [
                'id' => $comment->id,
                'name' => $comment->name,
                'content' => $comment->content,
                'formatted_date' => $comment->formatted_date,
                'gravatar' => $comment->gravatar,
                'replies' => $comment->replies
            ]
        ]);
    }
}
