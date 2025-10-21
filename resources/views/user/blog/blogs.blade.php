@extends('layouts.user.app')
@section('css')
@endsection
@section('wrapper_class')
    single-page-wrap
@endsection

@section('content')
    <!-- Content-->
    <div class="content">
        <!-- section-->
        <section class="parallax-section dark-bg sec-half parallax-sec-half-right" data-scrollax-parent="true">
            <div class="bg par-elem"
                data-bg="{{ $blogsPageContent->hero_background_image ? asset('storage/' . $blogsPageContent->hero_background_image) : 'images/bg/1.jpg' }}"
                data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay"></div>
            <div class="pattern-bg"></div>
            <div class="container">
                <div class="section-title">
                    <h2>{!! $blogsPageContent->hero_title !!}</h2>
                    @if ($blogsPageContent->hero_description)
                        <p>{!! $blogsPageContent->hero_description !!}</p>
                    @endif
                    <div class="horizonral-subtitle"><span>{{ $blogsPageContent->hero_subtitle }}</span></div>
                </div>
                <a href="#sec1"
                    class="custom-scroll-link hero-start-link"><span>{{ $blogsPageContent->hero_scroll_text }}</span> <i
                        class="fal fa-long-arrow-down"></i></a>
            </div>
        </section>
        <!-- section end-->
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
                        @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}" />
                        @endif
                        @if (request('tag'))
                            <input type="hidden" name="tag" value="{{ request('tag') }}" />
                        @endif
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
        <!-- section -->
        <section data-scrollax-parent="true" id="sec1">
            <div class="section-subtitle left-pos" data-scrollax="properties: { translateY: '-250px' }">
                <span>//</span>Journal
            </div>
            <div class="container">
                <!-- blog-container  -->
                <div class="fl-wrap post-container">
                    <div class="row">
                        <div class="col-md-8">
                            @forelse($blogs as $blogPost)
                                <!-- post -->
                                <div class="post fl-wrap fw-post">
                                    <h2><a href="{{ $blogPost->url }}"><span>{{ $blogPost->title }}</span></a></h2>
                                    <div class="parallax-header">
                                        <a
                                            href="#">{{ $blogPost->published_date ?? $blogPost->created_at->format('M d, Y') }}</a>
                                        <span>Category : </span>
                                        @foreach ($blogPost->categories as $category)
                                            <a
                                                href="{{ route('blogs.index', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </div>
                                    <!-- blog media -->
                                    @if ($blogPost->featured_image)
                                        <div class="blog-media fl-wrap">
                                            <img src="{{ asset('storage/' . $blogPost->featured_image) }}"
                                                alt="{{ $blogPost->title }}">
                                        </div>
                                    @endif
                                    <!-- blog media end -->
                                    <div class="parallax-header fl-wrap">
                                        <span>Tags : </span>
                                        @foreach ($blogPost->tags as $tag)
                                            <a
                                                href="{{ route('blogs.index', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a>
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="blog-text fl-wrap">
                                        <div class="clearfix"></div>
                                        <h3><a href="{{ $blogPost->url }}">{{ $blogPost->getExcerpt(100) }}</a></h3>
                                        <p>
                                            {!! $blogPost->getExcerpt(200) !!}
                                        </p>
                                        <a href="{{ $blogPost->url }}" class="btn float-btn color-btn flat-btn">Read more
                                        </a>
                                        <ul class="post-counter">
                                            <li><i
                                                    class="fa fa-eye"></i><span>{{ number_format($blogPost->view_count) }}</span>
                                            </li>
                                            <li><i
                                                    class="fal fa-comments-alt"></i><span>{{ number_format($blogPost->comment_count) }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- post end-->
                            @empty
                                <div class="text-center py-4">
                                    <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                                    <h5 class="text-muted">No blog posts found</h5>
                                    <p class="text-muted">Check back later for new content.</p>
                                </div>
                            @endforelse
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
                    @if ($blogs->hasPages())
                        <div class="content-nav">
                            <ul>
                                @if ($blogs->onFirstPage())
                                    <li><span class="ln disabled"><i class="fal fa-arrow-left"></i><span
                                                class="tooltip">No Previous Page</span></span></li>
                                @else
                                    <li><a href="{{ $blogs->previousPageUrl() }}" class="ln"><i
                                                class="fal fa-arrow-left"></i><span class="tooltip">Prev - page
                                                {{ $blogs->currentPage() - 1 }}</span></a></li>
                                @endif

                                <li>
                                    <span class="cur-page"><span>Page {{ $blogs->currentPage() }}</span></span>
                                </li>

                                @if ($blogs->hasMorePages())
                                    <li><a href="{{ $blogs->nextPageUrl() }}" class="rn"><i
                                                class="fal fa-arrow-right"></i><span class="tooltip">Next - page
                                                {{ $blogs->currentPage() + 1 }}</span></a></li>
                                @else
                                    <li><span class="rn disabled"><i class="fal fa-arrow-right"></i><span
                                                class="tooltip">No Next Page</span></span></li>
                                @endif
                            </ul>
                        </div>
                    @endif
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
            const searchInput = document.getElementById('se');
            const searchForm = searchInput.closest('form');

            // Add clear search functionality
            searchInput.addEventListener('input', function() {
                // Show clear button if there's text
                if (this.value.length > 0) {
                    addClearButton();
                } else {
                    removeClearButton();
                }
            });

            // Handle form submission
            searchForm.addEventListener('submit', function(e) {
                const searchValue = searchInput.value.trim();

                // Don't submit if search is empty and no other filters
                if (searchValue === '' && !hasOtherFilters()) {
                    e.preventDefault();
                    searchInput.focus();
                    return false;
                }

                // Remove search parameter if empty
                if (searchValue === '') {
                    const searchParam = searchForm.querySelector('input[name="search"]');
                    if (searchParam) {
                        searchParam.remove();
                    }
                }
            });

            function hasOtherFilters() {
                return document.querySelector('input[name="category"]') ||
                    document.querySelector('input[name="tag"]');
            }

            function addClearButton() {
                if (document.querySelector('.search-clear')) return;

                const clearButton = document.createElement('button');
                clearButton.type = 'button';
                clearButton.className = 'search-clear';
                clearButton.innerHTML = '<i class="fas fa-times"></i>';
                clearButton.style.cssText = `
            position: absolute;
            right: 115px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #666;
            cursor: pointer;
            padding: 5px;
            z-index: 10;
            font-size: 12px;
        `;

                clearButton.addEventListener('click', function() {
                    searchInput.value = '';
                    removeClearButton();

                    // If no other filters, redirect to clean URL
                    if (!hasOtherFilters()) {
                        window.location.href = '{{ route('blogs.index') }}';
                    }
                });

                searchInput.parentNode.style.position = 'relative';
                searchInput.parentNode.appendChild(clearButton);
            }

            function removeClearButton() {
                const clearButton = document.querySelector('.search-clear');
                if (clearButton) {
                    clearButton.remove();
                }
            }

            // Initialize clear button if there's existing search
            if (searchInput.value.length > 0) {
                addClearButton();
            }

            // Handle filter clicks to update search context
            document.querySelectorAll('.tag-filter a, .category-filter a').forEach(link => {
                link.addEventListener('click', function(e) {
                    // Preserve search if it exists
                    const currentSearch = searchInput.value.trim();
                    if (currentSearch) {
                        const url = new URL(this.href);
                        url.searchParams.set('search', currentSearch);
                        this.href = url.toString();
                    }
                });
            });
        });
    </script>
@endsection
