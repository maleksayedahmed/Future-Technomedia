@extends('layouts.user.app')
@section('css')

@endsection
@section('content')

<!-- Content-->
                <div class="content">
                    <div class="single-page-decor"></div>
                    <!-- filter-->
                    <div class="fsp-filter">
                        <div class="filter-title"><i class="fal fa-filter"></i><span>Portfolio Filter</span></div>
                        <div class="gallery-filters">
                            <a href="#" class="gallery-filter gallery-filter-active" data-filter="*">All ({{ $projects->count() }})</a>
                            @foreach($categories as $category)
                                @if($category->projects_count > 0)
                                    <a href="#" class="gallery-filter" data-filter=".category-{{ $category->id }}">
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
                                    
                                    // Check for video
                                    $video = $project->getFirstMedia('videos');
                                    $hasVideo = $video !== null;
                                    $videoUrl = $hasVideo ? $video->getUrl() : null;
                                    
                                    // Category class for filtering
                                    $categoryClass = $project->category ? 'category-' . $project->category->id : 'uncategorized';
                                @endphp
                                <!-- gallery-item-->
                                <div class="gallery-item {{ $categoryClass }}">
                                    <div class="grid-item-holder">
                                        @if($hasVideo)
                                            <a href="{{ $videoUrl }}" class="fet_pr-carousel-box-media-zoom image-popup"><i class="fal fa-play"></i></a>
                                        @else
                                            <a href="{{ $imageUrl }}" class="fet_pr-carousel-box-media-zoom image-popup"><i class="fal fa-search"></i></a>
                                        @endif
                                        <img src="{{ $imageThumb }}" alt="{{ $project->title }}">
                                        <div class="box-item hd-box">
                                            <div class="fl-wrap full-height">
                                                <div class="hd-box-wrap">
                                                    <h2>
                                                        @if($project->live_url)
                                                            <a href="{{ $project->live_url }}" target="_blank">{{ $project->title }}</a>
                                                        @else
                                                            <span>{{ $project->title }}</span>
                                                        @endif
                                                    </h2>
                                                    <p>
                                                        @if($project->category)
                                                            <a href="#">{{ $project->category->name }}</a>
                                                        @endif
                                                        @if($project->pricing_type === 'fixed' && $project->fixed_price)
                                                            <a href="#">${{ number_format($project->getDiscountedPrice(), 2) }}</a>
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
                            <!-- Static item removed-->
                            <div class="gallery-item photography" style="display:none;">
                                <div class="grid-item-holder">
                                    <a href="images/folio/1.jpg" class="fet_pr-carousel-box-media-zoom   image-popup"><i class="fal fa-search"></i></a>
                                    <img  src="images/folio/1.jpg"    alt="">
                                    <div class="box-item hd-box">
                                        <div class=" fl-wrap full-height">
                                            <div class="hd-box-wrap">
                                                <h2><a href="portfolio-single.html">Old Cars on Street</a></h2>
                                                <p><a href="#"> Photography  </a> <a href="#"> Development</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- gallery-item end-->
                            <!-- gallery-item-->
                            <div class="gallery-item branding gallery-item-second">
                                <div class="grid-item-holder">
                                    <a href="images/folio/1.jpg" class="fet_pr-carousel-box-media-zoom   image-popup"><i class="fal fa-search"></i></a>
                                    <img  src="images/folio/1.jpg"    alt="">
                                    <div class="box-item hd-box">
                                        <div class=" fl-wrap full-height">
                                            <div class="hd-box-wrap">
                                                <h2><a href="portfolio-single.html">Mobile ui Interface</a></h2>
                                                <p><a href="#">Development </a>  <a href="#"> Branding</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- gallery-item end-->
                            <!-- gallery-item-->
                            <div class="gallery-item web">
                                <div class="grid-item-holder">
                                    <a href="https://vimeo.com/115735583" class="fet_pr-carousel-box-media-zoom   image-popup"><i class="fal fa-play"></i></a>
                                    <img  src="images/folio/1.jpg"    alt="">
                                    <div class="box-item hd-box">
                                        <div class=" fl-wrap full-height">
                                            <div class="hd-box-wrap">
                                                <h2><a href="portfolio-single.html">Video Project</a></h2>
                                                <p><a href="#">Video  </a> <a href="#"> Branding</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- gallery-item end-->
                            <!-- gallery-item-->
                            <div class="gallery-item web branding ">
                                <div class="grid-item-holder">
                                    <a href="images/folio/1.jpg" class="fet_pr-carousel-box-media-zoom   image-popup"><i class="fal fa-search"></i></a>
                                    <img  src="images/folio/1.jpg"    alt="">
                                    <div class="box-item hd-box">
                                        <div class=" fl-wrap full-height">
                                            <div class="hd-box-wrap">
                                                <h2><a href="portfolio-single.html">Barbershop Website</a></h2>
                                                <p><a href="#">Photography  </a> <a href="#"> Web </a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- gallery-item end-->
                            <!-- gallery-item-->
                            <div class="gallery-item uides ">
                                <div class="grid-item-holder">
                                    <a href="images/folio/1.jpg" class="fet_pr-carousel-box-media-zoom   image-popup"><i class="fal fa-search"></i></a>
                                    <img  src="images/folio/1.jpg"    alt="">
                                    <div class="box-item hd-box">
                                        <div class=" fl-wrap full-height">
                                            <div class="hd-box-wrap">
                                                <h2><a href="portfolio-single.html">Man in Old Town</a></h2>
                                                <p><a href="#">Photography  </a> <a href="#"> Ui</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- gallery-item end-->
                            <!-- gallery-item-->
                            <div class="gallery-item branding photography ">
                                <div class="grid-item-holder">
                                    <a href="https://www.youtube.com/watch?v=Hg5iNVSp2z8" class="fet_pr-carousel-box-media-zoom   image-popup"><i class="fal fa-play"></i></a>
                                    <img  src="images/folio/1.jpg"    alt="">
                                    <div class="box-item hd-box">
                                        <div class=" fl-wrap full-height">
                                            <div class="hd-box-wrap">
                                                <h2><a href="portfolio-single.html">Youtube Video Project</a></h2>
                                                <p><a href="#">Video  </a><a href="#"> Web design</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- gallery-item end-->
                            <!-- gallery-item-->
                            <div class="gallery-item uides web">
                                <div class="grid-item-holder">
                                    <a href="images/folio/1.jpg" class="fet_pr-carousel-box-media-zoom   image-popup"><i class="fal fa-search"></i></a>
                                    <img  src="images/folio/1.jpg"    alt="">
                                    <div class="box-item hd-box">
                                        <div class=" fl-wrap full-height">
                                            <div class="hd-box-wrap">
                                                <h2><a href="portfolio-single.html">Mobile ui Interface</a></h2>
                                                <p><a href="#">Development  </a> <a href="#">Ui</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- gallery-item end-->
                            <!-- gallery-item-->
                            <div class="gallery-item uides photography">
                                <div class="grid-item-holder">
                                    <a href="https://vimeo.com/6698875" class="fet_pr-carousel-box-media-zoom   image-popup"><i class="fal fa-play"></i></a>
                                    <img  src="images/folio/1.jpg"    alt="">
                                    <div class="box-item hd-box">
                                        <div class=" fl-wrap full-height">
                                            <div class="hd-box-wrap">
                                                <h2><a href="portfolio-single.html">Project Vimeo</a></h2>
                                                <p><a href="#">Development  </a>  <a href="#"> Video</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- gallery-item end-->
                            <!-- gallery-item-->
                            <div class="gallery-item web ">
                                <div class="grid-item-holder">
                                    <a href="images/folio/1.jpg" class="fet_pr-carousel-box-media-zoom   image-popup"><i class="fal fa-search"></i></a>
                                    <img  src="images/folio/1.jpg"    alt="">
                                    <div class="box-item hd-box">
                                        <div class=" fl-wrap full-height">
                                            <div class="hd-box-wrap">
                                                <h2><a href="portfolio-single.html">Architecture Agensy</a></h2>
                                                <p><a href="#">Development   </a> <a href="#"> Wed Design</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- gallery-item end-->
                            <!-- gallery-item-->
                            <div class="gallery-item web photography">
                                <div class="grid-item-holder">
                                    <a href="images/folio/1.jpg" class="fet_pr-carousel-box-media-zoom   image-popup"><i class="fal fa-search"></i></a>
                                    <img  src="images/folio/1.jpg"    alt="">
                                    <div class="box-item hd-box">
                                        <div class=" fl-wrap full-height">
                                            <div class="hd-box-wrap">
                                                <h2><a href="portfolio-single.html">Corporate website</a></h2>
                                                <p><a href="#">Development   </a>  <a href="#"> Wed Design</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- gallery-item end-->
                            <!-- gallery-item-->
                            <div class="gallery-item web uides">
                                <div class="grid-item-holder">
                                    <a href="images/folio/1.jpg" class="fet_pr-carousel-box-media-zoom   image-popup"><i class="fal fa-search"></i></a>
                                    <img  src="images/folio/1.jpg"    alt="">
                                    <div class="box-item hd-box">
                                        <div class=" fl-wrap full-height">
                                            <div class="hd-box-wrap">
                                                <h2><a href="portfolio-single.html">Personal website</a></h2>
                                                <p><a href="#">Development   </a>  <a href="#"> Wed Design</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- gallery-item end-->
                            <!-- gallery-item-->
                            <div class="gallery-item photography">
                                <div class="grid-item-holder">
                                    <a href="images/folio/1.jpg" class="fet_pr-carousel-box-media-zoom   image-popup"><i class="fal fa-search"></i></a>
                                    <img  src="images/folio/1.jpg"    alt="">
                                    <div class="box-item hd-box">
                                        <div class=" fl-wrap full-height">
                                            <div class="hd-box-wrap">
                                                <h2><a href="portfolio-single.html">Corporate website</a></h2>
                                                <p><a href="#">Development   </a> <a href="#"> Wed Design</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- gallery-item end-->
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
                                <div class="col-md-4"><a href="contscts.html" class="btn flat-btn color-btn">Get In Touch</a> </div>
                            </div>
                        </div>
                    </section>
                    <!-- section end-->
                </div>
                
@endsection

@section('js')

@endsection
