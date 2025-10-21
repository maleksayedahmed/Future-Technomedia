@extends('layouts.user.app')
@section('css')
<style>
    .related-posts {
        margin: 40px 0;
        padding: 30px 0;
        border-top: 1px solid #eee;
        border-bottom: 1px solid #eee;
    }

    .related-posts-title {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 25px;
        color: #333;
    }

    .related-posts-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .related-post-item {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .related-post-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
    }

    .related-post-img {
        height: 150px;
        overflow: hidden;
    }

    .related-post-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .related-post-content {
        padding: 15px;
    }

    .related-post-content h4 {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 8px;
        line-height: 1.4;
    }

    .related-post-content h4 a {
        color: #333;
        text-decoration: none;
    }

    .related-post-content h4 a:hover {
        color: #007bff;
    }

    .related-post-content p {
        font-size: 14px;
        color: #666;
        margin-bottom: 10px;
        line-height: 1.4;
    }

    .related-post-meta {
        font-size: 12px;
        color: #999;
    }

    .related-post-meta span {
        display: inline-block;
        padding: 2px 8px;
        background: #f8f9fa;
        border-radius: 12px;
    }

    @media (max-width: 768px) {
        .related-posts-container {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection
@section('wrapper_class')
    single-page-wrap
@endsection

@section('content')
    <!-- Content-->
    <div class="content">
        <div class="single-page-decor"></div>
        <!-- single-page-fixed-row-->
        <div class="single-page-fixed-row blog-single-page-fixed-row">
            <div class="scroll-down-wrap">
                <div class="mousey">
                    <div class="scroller"></div>
                </div>
                <span>Scroll Down</span>
            </div>
            <!-- filter  -->
            <div class="blog-filters">
                <span>Filter by: </span>
                <!-- filter tag   -->
                <div class="tag-filter blog-btn-filter">
                    <div class="blog-btn">Tags <i class="fa fa-tags" aria-hidden="true"></i></div>
                    <ul>
                        @forelse($tags as $tag)
                            <li><a href="{{ route('blogs.index', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a></li>
                        @empty
                            <li><span class="text-muted">No tags available</span></li>
                        @endforelse
                    </ul>
                </div>
                <!-- filter tag end  -->
                <!-- filter category    -->
                <div class="category-filter blog-btn-filter">
                    <div class="blog-btn">Categories <i class="fa fa-list-ul" aria-hidden="true"></i></div>
                    <ul>
                        @forelse($categories as $category)
                            <li><a
                                    href="{{ route('blogs.index', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                            </li>
                        @empty
                            <li><span class="text-muted">No categories available</span></li>
                        @endforelse
                    </ul>
                </div>
                <!-- filter category end  -->
                <div class="blog-search">
                    <form action="{{ route('blogs.index') }}" method="GET" class="searh-inner fl-wrap">
                        <input name="search" id="se" type="text" class="search" placeholder="Search posts..."
                            value="{{ request('search') }}" />
                        <button type="submit" class="search-submit color-bg" id="submit_btn"><i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
            <!-- filter end    -->
        </div>
        <!-- single-page-fixed-row end-->
        <!-- section end-->
        <!-- section -->
        <section data-scrollax-parent="true" id="sec1">
            <div class="section-subtitle left-pos" data-scrollax="properties: { translateY: '-250px' }"><span>//</span>Post
                title</div>
            <div class="container">
                <!-- blog-container  -->
                <div class="fl-wrap post-container">
                    <div class="row">
                        <div class="col-md-8">
                            <!-- post -->
                            <div class="post fl-wrap fw-post">
                                <h2><span>{{ $blog->title }}</span></h2>
                                <div class="parallax-header">
                                    <a href="#">{{ $blog->published_date ?? $blog->created_at->format('M d, Y') }}</a>
                                    <span>Category : </span>
                                    @foreach ($blog->categories as $category)
                                        <a
                                            href="{{ route('blogs.index', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </div>
                                <!-- blog media -->
                                @if ($blog->featured_image)
                                    <div class="blog-media fl-wrap nomar-bottom">
                                        <img src="{{ asset('storage/' . $blog->featured_image) }}"
                                            alt="{{ $blog->title }}">
                                    </div>
                                @endif
                                <!-- blog media end -->
                                <div class="parallax-header fl-wrap">
                                    <span>Tags : </span>
                                    @foreach ($blog->tags as $tag)
                                        <a
                                            href="{{ route('blogs.index', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a>
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </div>
                                <div class="blog-text fl-wrap">
                                    <div class="clearfix"></div>
                                    {!! $blog->content !!}
                                    <ul class="post-counter single-post-counter">
                                        <li><i class="fa fa-eye"></i><span>{{ number_format($blog->view_count) }}</span>
                                        </li>
                                        <li><i
                                                class="fal fa-comments-alt"></i><span>{{ number_format($blog->comment_count) }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- post end-->
                            <!-- post-author-->
                            <div class="post-author">
                                <div class="author-img">
                                    <img alt="{{ $blog->author->name }}"
                                        src="https://ui-avatars.com/api/?name={{ urlencode($blog->author->name) }}&size=100&background=4A90E2&color=ffffff">
                                </div>
                                <div class="author-content">
                                    <h5><a href="#">{{ $blog->author->name }}</a></h5>
                                    <p>{{ $blog->author->bio ?? 'Blog author and content creator sharing insights and experiences in web development and technology.' }}
                                    </p>
                                </div>
                            </div>
                            <!--post-author end-->
                            <!-- related posts -->
                            @if ($relatedBlogs->count() > 0)
                                <div class="related-posts">
                                    <h3 class="related-posts-title">Related Posts</h3>
                                    <div class="related-posts-container">
                                        @foreach ($relatedBlogs as $relatedPost)
                                            <div class="related-post-item">
                                                <div class="related-post-img">
                                                    @if ($relatedPost->featured_image)
                                                        <img src="{{ asset('storage/' . $relatedPost->featured_image) }}"
                                                            alt="{{ $relatedPost->title }}">
                                                    @else
                                                        <div class="bg-light d-flex align-items-center justify-content-center"
                                                            style="width: 100%; height: 120px;">
                                                            <i class="fas fa-newspaper fa-2x text-muted"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="related-post-content">
                                                    <h4><a href="{{ $relatedPost->url }}">{{ $relatedPost->title }}</a>
                                                    </h4>
                                                    <p>{{ $relatedPost->getExcerpt(80) }}</p>
                                                    <div class="related-post-meta">
                                                        <span>{{ $relatedPost->published_date ?? $relatedPost->created_at->format('M d, Y') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <!-- related posts end -->
                            <div id="comments" class="single-post-comm">
                                <!--title-->
                                <h6 id="comments-title">Comments<span>({{ $blog->approvedComments->count() }})</span></h6>

                                @if ($blog->approvedComments->count() > 0)
                                    <div class="comments-list">
                                        <ul class="commentlist clearafix">
                                            @foreach ($blog->approvedComments->whereNull('parent_id') as $comment)
                                                <li class="comment">
                                                    <div class="comment-body">
                                                        <div class="comment-author">
                                                            <img alt="{{ $comment->name }}" src="{{ $comment->gravatar }}"
                                                                width="50" height="50">
                                                        </div>
                                                        <cite class="fn"><a
                                                                href="#">{{ $comment->name }}</a></cite>
                                                        <div class="comment-meta">
                                                            <h6><a href="#">{{ $comment->formatted_date }}</a></h6>
                                                        </div>
                                                        <p>{{ $comment->content }}</p>

                                                        @if ($comment->replies->count() > 0)
                                                            <ul class="children">
                                                                @foreach ($comment->replies as $reply)
                                                                    <li class="comment">
                                                                        <div class="comment-body">
                                                                            <div class="comment-author">
                                                                                <img alt="{{ $reply->name }}"
                                                                                    src="{{ $reply->gravatar }}"
                                                                                    width="50" height="50">
                                                                            </div>
                                                                            <cite class="fn"><a
                                                                                    href="#">{{ $reply->name }}</a></cite>
                                                                            <div class="comment-meta">
                                                                                <h6><a
                                                                                        href="#">{{ $reply->formatted_date }}</a>
                                                                                </h6>
                                                                            </div>
                                                                            <p>{{ $reply->content }}</p>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @else
                                    <div class="no-comments">
                                        <div class="text-center py-4">
                                            <i class="fal fa-comments fa-3x text-muted mb-3"></i>
                                            <h6 class="text-muted">No comments yet</h6>
                                            <p class="text-muted">Be the first to leave a comment on this post.</p>
                                        </div>
                                    </div>
                                @endif

                                <div class="clearfix"></div>
                                <div id="respond" class="clearafix">
                                    <h6 id="reply-title">Leave a Comment</h6>
                                    <div class="comment-reply-form clearfix">
                                        <form id="comment-form" class="add-comment custom-form" method="POST">
                                            @csrf
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label><i class="fal fa-user"></i></label>
                                                        <input type="text" name="name" placeholder="Your Name *"
                                                            value="" required />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label><i class="fal fa-envelope-open"></i></label>
                                                        <input type="email" name="email" placeholder="Email Address*"
                                                            value="" required />
                                                    </div>
                                                </div>
                                                <textarea name="content" cols="40" rows="3" placeholder="Your Comment:" required></textarea>
                                            </fieldset>
                                            <button type="submit" class="btn flat-btn color-btn" id="submit-comment">
                                                <span class="submit-text">Submit Comment</span>
                                                <span class="loading-text" style="display: none;">
                                                    <i class="fas fa-spinner fa-spin"></i> Posting...
                                                </span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <!--end respond-->
                            </div>
                            <!--comments end -->
                        </div>
                        <!-- blog-sidebar  -->
                        <div class="col-md-4">
                            <div class="blog-sidebar fl-wrap fixed-bar">
                                <!-- widget-wrap -->
                                <div class="widget-wrap fl-wrap">
                                    <h4 class="widget-title"><span>02.</span> Recent Posts</h4>
                                    <div class="widget-container fl-wrap">
                                        <div class="widget-posts fl-wrap">
                                            <ul>
                                                @forelse($recentBlogs as $recentPost)
                                                    <li class="clearfix">
                                                        <a href="{{ $recentPost->url }}" class="widget-posts-img">
                                                            @if ($recentPost->featured_image)
                                                                <img src="{{ asset('storage/' . $recentPost->featured_image) }}"
                                                                    class="respimg" alt="{{ $recentPost->title }}">
                                                            @else
                                                                <div class="bg-light d-flex align-items-center justify-content-center"
                                                                    style="width: 60px; height: 45px;">
                                                                    <i class="fas fa-newspaper text-muted"></i>
                                                                </div>
                                                            @endif
                                                        </a>
                                                        <div class="widget-posts-descr">
                                                            <a href="{{ $recentPost->url }}"
                                                                title="{{ $recentPost->title }}">{{ Str::limit($recentPost->title, 25) }}</a>
                                                            <span class="widget-posts-date">
                                                                {{ $recentPost->published_date ?? $recentPost->created_at->format('M d, H.i') }}
                                                            </span>
                                                        </div>
                                                    </li>
                                                @empty
                                                    <li class="text-center py-2">
                                                        <small class="text-muted">No recent posts</small>
                                                    </li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- widget-wrap end  -->
                                <!-- widget-wrap -->
                                <div class="widget-wrap fl-wrap">
                                    <h4 class="widget-title"><span>03.</span> Tags</h4>
                                    <div class="widget-container fl-wrap">
                                        <ul class="tagcloud">
                                            @forelse($tags as $tag)
                                                <li>
                                                    <a href="{{ route('blogs.index', ['tag' => $tag->slug]) }}"
                                                        class="transition link"
                                                        title="{{ $tag->name }} ({{ $tag->blogs_count }} posts)">
                                                        {{ $tag->name }}
                                                    </a>
                                                </li>
                                            @empty
                                                <li><small class="text-muted">No tags available</small></li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                                <!-- widget-wrap end  -->
                                <!-- widget-wrap -->
                                <div class="widget-wrap fl-wrap">
                                    <h4 class="widget-title"><span>04.</span> Categories</h4>
                                    <div class="widget-container fl-wrap">
                                        <ul class="cat-item">
                                            @forelse($categories as $category)
                                                <li>
                                                    <a href="{{ route('blogs.index', ['category' => $category->slug]) }}">
                                                        {{ $category->name }}
                                                    </a>
                                                    <span>({{ $category->blogs_count ?? 0 }})</span>
                                                </li>
                                            @empty
                                                <li><small class="text-muted">No categories available</small></li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                                <!-- widget-wrap end  -->
                            </div>
                        </div>
                        <!-- blog-sidebar end -->
                        <div class="limit-box fl-wrap"></div>
                    </div>
                    <!-- content-nav -->
                    <div class="content-nav">
                        <ul>
                            <li><a href="blog.html" class="ln"><i class="fal fa-arrow-left"></i><span
                                        class="tooltip">Prev - page 1</span></a></li>
                            <li>
                                <span class="cur-page"><span>Page 2</span></span>
                            </li>
                            <li><a href="blog.html" class="rn"><i class="fal fa-arrow-right"></i><span
                                        class="tooltip">Next - page 2 </span></a></li>
                        </ul>
                    </div>
                    <!-- content-nav end-->
                </div>
                <!-- blog-container end    -->
            </div>
            <div class="bg-parallax-module" data-position-top="50" data-position-left="20"
                data-scrollax="properties: { translateY: '-250px' }"></div>
            <div class="bg-parallax-module" data-position-top="40" data-position-left="70"
                data-scrollax="properties: { translateY: '150px' }"></div>
            <div class="bg-parallax-module" data-position-top="80" data-position-left="80"
                data-scrollax="properties: { translateY: '350px' }"></div>
            <div class="bg-parallax-module" data-position-top="95" data-position-left="40"
                data-scrollax="properties: { translateY: '-550px' }"></div>
            <div class="sec-lines"></div>
        </section>
        <!-- section end-->
        <!-- section-->
        <section class="dark-bg2 small-padding order-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h3>Ready To order Your Project ?</h3>
                    </div>
                    <div class="col-md-4"><a href="contscts.html" class="btn flat-btn color-btn">Get In Touch</a> </div>
                </div>
            </div>
        </section>
        <!-- section end-->
    </div>
    <!-- Content end -->
@endsection


@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const commentForm = document.getElementById('comment-form');
        const submitButton = document.getElementById('submit-comment');
        const submitText = submitButton.querySelector('.submit-text');
        const loadingText = submitButton.querySelector('.loading-text');
        const commentsTitle = document.getElementById('comments-title');
        const commentsList = document.querySelector('.comments-list');
        const noComments = document.querySelector('.no-comments');

        commentForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Show loading state
            submitButton.disabled = true;
            submitText.style.display = 'none';
            loadingText.style.display = 'inline';

            // Clear any previous error messages
            clearErrors();

            const formData = new FormData(commentForm);

            fetch(`{{ url('/blogs/' . $blog->slug . '/comments') }}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content'),
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Show success message
                        showMessage('Comment posted successfully!', 'success');

                        // Add the new comment to the list
                        addCommentToList(data.comment);

                        // Update comment count
                        updateCommentCount(parseInt(commentsTitle.querySelector('span')
                            .textContent) + 1);

                        // Hide "no comments" message if it exists
                        if (noComments) {
                            noComments.style.display = 'none';
                        }

                        // Show comments list if it was hidden
                        if (commentsList) {
                            commentsList.style.display = 'block';
                        } else {
                            // Create comments list if it doesn't exist
                            createCommentsList(data.comment);
                        }

                        // Reset form
                        commentForm.reset();
                    } else {
                        // Show validation errors
                        showErrors(data.errors);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showMessage('An error occurred while posting your comment. Please try again.',
                        'error');
                })
                .finally(() => {
                    // Reset button state
                    submitButton.disabled = false;
                    submitText.style.display = 'inline';
                    loadingText.style.display = 'none';
                });
        });

        function showMessage(message, type) {
            // Remove any existing messages
            const existingAlert = document.querySelector('.comment-alert');
            if (existingAlert) {
                existingAlert.remove();
            }

            // Create new alert
            const alert = document.createElement('div');
            alert.className =
                `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show comment-alert`;
            alert.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;

            // Insert before the comment form
            const respondDiv = document.getElementById('respond');
            respondDiv.insertBefore(alert, respondDiv.firstChild);

            // Auto-remove after 5 seconds
            setTimeout(() => {
                if (alert.parentNode) {
                    alert.remove();
                }
            }, 5000);
        }

        function showErrors(errors) {
            let errorMessages = [];

            for (const field in errors) {
                if (errors.hasOwnProperty(field)) {
                    const input = commentForm.querySelector(`[name="${field}"]`);
                    if (input) {
                        input.classList.add('is-invalid');

                        // Add error message
                        const errorDiv = document.createElement('div');
                        errorDiv.className = 'invalid-feedback d-block';
                        errorDiv.textContent = errors[field][0];
                        input.parentNode.appendChild(errorDiv);
                    }
                    errorMessages.push(errors[field][0]);
                }
            }

            if (errorMessages.length > 0) {
                showMessage(errorMessages.join('<br>'), 'error');
            }
        }

        function clearErrors() {
            // Remove error classes
            commentForm.querySelectorAll('.is-invalid').forEach(input => {
                input.classList.remove('is-invalid');
            });

            // Remove error messages
            commentForm.querySelectorAll('.invalid-feedback').forEach(error => {
                error.remove();
            });
        }

        function addCommentToList(comment) {
            // Create comment HTML
            const commentHTML = `
            <li class="comment">
                <div class="comment-body">
                    <div class="comment-author">
                        <img alt="${comment.name}" src="${comment.gravatar}" width="50" height="50">
                    </div>
                    <cite class="fn"><a href="#">${comment.name}</a></cite>
                    <div class="comment-meta">
                        <h6><a href="#">${comment.formatted_date}</a></h6>
                    </div>
                    <p>${comment.content}</p>
                </div>
            </li>
        `;

            if (commentsList && commentsList.querySelector('ul')) {
                commentsList.querySelector('ul').insertAdjacentHTML('afterbegin', commentHTML);
            }
        }

        function createCommentsList(comment) {
            const commentsContainer = document.createElement('div');
            commentsContainer.className = 'comments-list';
            commentsContainer.innerHTML = `
            <ul class="commentlist clearafix">
                <li class="comment">
                    <div class="comment-body">
                        <div class="comment-author">
                            <img alt="${comment.name}" src="${comment.gravatar}" width="50" height="50">
                        </div>
                        <cite class="fn"><a href="#">${comment.name}</a></cite>
                        <div class="comment-meta">
                            <h6><a href="#">${comment.formatted_date}</a></h6>
                        </div>
                        <p>${comment.content}</p>
                    </div>
                </li>
            </ul>
        `;

            // Insert before the respond div
            const respondDiv = document.getElementById('respond');
            const commentsDiv = document.getElementById('comments');
            commentsDiv.insertBefore(commentsContainer, respondDiv);
        }

        function updateCommentCount(newCount) {
            const countSpan = commentsTitle.querySelector('span');
            if (countSpan) {
                countSpan.textContent = `(${newCount})`;
            }
        }
    });
</script>
@endsection




