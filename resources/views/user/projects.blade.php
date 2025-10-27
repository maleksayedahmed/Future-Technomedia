@extends('layouts.user.app')
@section('css')
@endsection
@section('wrapper_class')
    single-page-wrap
@endsection
@section('content')
    <!-- Content-->
    <div class="content">
        <div class="single-page-decor"></div>
        <!-- filter-->
        <div class="fsp-filter">
            <div class="filter-title"><i class="fal fa-filter"></i><span>Portfolio Filter</span></div>
            <div class="gallery-filters">
                <a href="#" class="gallery-filter {{ !isset($selectedCategory) ? 'gallery-filter-active' : '' }}"
                    data-filter="*">All ({{ $projects->count() }})</a>
                @foreach ($categories as $category)
                    @if ($category->projects_count > 0)
                        <a href="#"
                            class="gallery-filter {{ isset($selectedCategory) && $selectedCategory == $category->id ? 'gallery-filter-active' : '' }}"
                            data-filter=".category-{{ $category->id }}">
                            {{ $category->name }} ({{ $category->projects_count }})
                        </a>
                    @endif
                @endforeach
            </div>
            <div class="folio-counter">
                <div class="num-album"></div>
                <div class="all-album"></div>
            </div>
        </div>
        <!-- filter end -->
        <!-- section-->
        <section class="no-padding dark-bg">
            <!-- portfolio start -->
            <div class="gallery-items min-pad hde four-column">
                @forelse($projects as $project)
                    @php
                        // Get the first gallery image
                        $galleryImage = $project->getFirstMedia('gallery');
                        $imageUrl = $galleryImage ? $galleryImage->getUrl() : asset('images/folio/1.jpg');
                        $imageThumb = $galleryImage ? $galleryImage->getUrl('thumb') : asset('images/folio/1.jpg');

                        // Category class for filtering
                        $categoryClass = $project->category ? 'category-' . $project->category->id : 'uncategorized';
                    @endphp
                    <!-- gallery-item-->
                    <div class="gallery-item {{ $categoryClass }}">
                        <div class="grid-item-holder">
                            <a href="{{ $imageUrl }}" class="fet_pr-carousel-box-media-zoom   image-popup"><i
                                    class="fal fa-search"></i></a>
                            <img src="{{ $imageThumb }}" alt="{{ $project->title }}">
                            <div class="box-item hd-box">
                                <div class=" fl-wrap full-height">
                                    <div class="hd-box-wrap">
                                        <h2>
                                            <a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a>
                                        </h2>
                                        <p>
                                            @if ($project->category)
                                                <a href="#">{{ $project->category->name }}</a>
                                            @endif
                                            @if ($project->pricing_type === 'fixed' && $project->fixed_price)
                                                <a
                                                    href="#">${{ number_format($project->getDiscountedPrice(), 2) }}</a>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- gallery-item end-->
                @empty
                    <!-- No projects message -->
                    <div class="col-12 text-center py-5">
                        <h3 class="text-white">No projects available yet.</h3>
                        <p class="text-light">Check back soon for our latest work!</p>
                    </div>
                @endforelse
            </div>
            <!-- portfolio end -->
        </section>
        <!-- section end-->
        <!-- section-->
        <section class="dark-bg2 small-padding order-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h3>Ready To order Your Project ?</h3>
                    </div>
                    <div class="col-md-4"><a href="{{ route('contact') }}" class="btn flat-btn color-btn">Get In Touch</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- section end-->
    </div>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (isset($selectedCategory))
                // Trigger filter for selected category
                const filterButton = document.querySelector(
                    '.gallery-filter[data-filter=".category-{{ $selectedCategory }}"]');
                if (filterButton) {
                    // Small delay to ensure isotope/filter is initialized
                    setTimeout(function() {
                        filterButton.click();
                    }, 100);
                }
            @endif
        });
    </script>
@endsection
