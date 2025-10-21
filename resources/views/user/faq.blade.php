@extends('layouts.user.app')
@section('css')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/project-show.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/faq.css') }}">
@endsection
@section('wrapper_class')
    single-page-wrap
@endsection
@section('content')
    <div class="single-page-decor"></div>
    <div class="single-page-fixed-row">
        <div class="scroll-down-wrap">
            <div class="mousey">
                <div class="scroller"></div>
            </div>
            <span>Scroll Down</span>
        </div>
        <a href="{{ route('home') }}" class="single-page-fixed-row-link"><i class="fal fa-arrow-left"></i>
            <span>Back to home</span></a>
    </div>

    <div class="content">
        <div class="single-page-decor"></div>
        <div class="single-page-fixed-row">
            <div class="scroll-down-wrap">
                <div class="mousey">
                    <div class="scroller"></div>
                </div>
                <span>Scroll Down</span>
            </div>
            <a href="{{ route('home') }}" class="single-page-fixed-row-link"><i class="fal fa-arrow-left"></i>
                <span>Back to home</span></a>
        </div>

        <section class="no-padding dark-bg sinsec-dec">
            <div class="single-project-title fl-wrap faq-hero">
                <span class="faq-badge"><i class="fal fa-life-ring"></i> Support center</span>
                <h1><span class="caption">Frequently Asked Questions</span></h1>
                <p class="faq-hero-text">Discover how we partner with teams to launch digital products, streamline
                    operations, and support long-term growth. Start with the answers below or reach out for tailored
                    advice.</p>
                <div class="faq-hero-actions">
                    <a href="{{ route('contact') }}" class="btn flat-btn color-btn"><i class="fas fa-headset me-2"></i>
                        Talk to an expert</a>
                    <a href="{{ route('projects') }}" class="btn flat-btn border-btn"><i
                            class="fas fa-folder-open me-2"></i> Explore our work</a>
                </div>
            </div>
            <div class="half-bg-dec single-half-bg-dec" data-ran="12"></div>
            <div class="sec-lines"></div>
        </section>

        <section class="faq-section" data-scrollax-parent="true">
            <div class="section-subtitle right-pos" data-scrollax="properties: { translateY: '-250px' }">
                <span>//</span>Knowledge base
            </div>
            <div class="container">
                <div class="faq-layout fl-wrap">
                    <div class="faq-main">
                        <div class="faq-intro card-shadow">
                            <span class="faq-intro-badge"><i class="fal fa-bolt"></i> Most popular questions</span>
                            <h2>Everything you need to know before getting started</h2>
                            <p>We’ve compiled the questions we hear most from founders, product owners, and operations
                                teams. Browse the topics below to understand our process, collaboration style, and what to
                                expect when working with Future Technomedia.</p>
                        </div>

                        @if ($faqs->count() > 0)
                            <div class="faq-accordion" data-faq-accordion>
                                @foreach ($faqs as $faq)
                                    <div class="faq-item card-shadow {{ $loop->first ? 'is-open' : '' }}">
                                        <button class="faq-question" type="button" data-faq-toggle>
                                            <span class="faq-question-icon"><i class="fas fa-question"></i></span>
                                            <span class="faq-question-text">{{ $faq->question }}</span>
                                            <span class="faq-toggle-icon">
                                                <i class="fal fa-plus"></i>
                                            </span>
                                        </button>
                                        <div class="faq-answer" {!! $loop->first ? 'style="display:block"' : '' !!}>
                                            <div class="faq-answer-inner">
                                                {!! nl2br(e($faq->answer)) !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="faq-empty card-shadow">
                                <i class="fas fa-question-circle"></i>
                                <h3>No FAQs available yet</h3>
                                <p>We’re preparing helpful content to guide you through our services. In the meantime,
                                    reach out and our consultants will gladly assist.</p>
                                <a class="btn flat-btn color-btn" href="{{ route('contact') }}"><i
                                        class="fas fa-envelope me-2"></i>Contact support</a>
                            </div>
                        @endif
                    </div>

                    <aside class="faq-sidebar">
                        <div class="faq-support card-shadow">
                            <h3>Need a quick answer?</h3>
                            <p>Talk directly with our customer success team about project timelines, tech stacks, or
                                engagement models.</p>
                            <div class="faq-support-meta">
                                <div class="faq-support-avatar">FT</div>
                                <div>
                                    <strong>Customer Success</strong>
                                    <span>Avg. response time: under 24h</span>
                                </div>
                            </div>
                            <a class="btn flat-btn color-btn w-100" href="{{ route('contact') }}"><i
                                    class="fas fa-comments-alt me-2"></i>Start the conversation</a>
                        </div>

                        <div class="faq-highlight card-shadow">
                            <h4>Why teams choose us</h4>
                            <ul>
                                <li><i class="fal fa-check"></i> Transparent milestones & weekly updates</li>
                                <li><i class="fal fa-check"></i> Dedicated squad for each engagement</li>
                                <li><i class="fal fa-check"></i> Laravel, Vue, React, Flutter & more</li>
                                <li><i class="fal fa-check"></i> Reliable maintenance & support plans</li>
                            </ul>
                        </div>

                        <div class="faq-quick-links card-shadow">
                            <h4>Quick links</h4>
                            <ul>
                                <li><a href="{{ route('projects') }}"><i class="fal fa-arrow-right"></i> View our
                                        portfolio</a></li>
                                <li><a href="{{ route('blogs.index') }}"><i class="fal fa-arrow-right"></i> Insights &
                                        case studies</a></li>
                                <li><a href="{{ route('contact') }}"><i class="fal fa-arrow-right"></i> Request a
                                        tailored quote</a></li>
                            </ul>
                        </div>
                    </aside>
                </div>
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

        <section class="dark-bg2 small-padding order-wrap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h3>Ready to kick off your next project?</h3>
                        <p class="faq-cta-text">Let’s align on your goals, map out milestones, and design a solution that
                            scales with your team.</p>
                    </div>
                    <div class="col-md-4"><a href="{{ route('contact') }}" class="btn flat-btn color-btn w-100">Get in
                            touch</a></div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script>
        (function($) {
            $(function() {
                var $accordion = $('[data-faq-accordion]');

                $accordion.find('.faq-item').each(function() {
                    var $item = $(this);
                    var $icon = $item.find('.faq-toggle-icon i');
                    var $answer = $item.find('.faq-answer');

                    if ($item.hasClass('is-open')) {
                        $icon.removeClass('fa-plus').addClass('fa-minus');
                        $answer.show();
                    } else {
                        $answer.hide();
                    }
                });

                $accordion.on('click', '[data-faq-toggle]', function() {
                    var $button = $(this);
                    var $item = $button.closest('.faq-item');
                    var $answer = $item.find('.faq-answer');
                    var $icon = $button.find('.faq-toggle-icon i');

                    if ($item.hasClass('is-open')) {
                        $item.removeClass('is-open');
                        $answer.stop(true, true).slideUp(220);
                        $icon.removeClass('fa-minus').addClass('fa-plus');
                        return;
                    }

                    $accordion.find('.faq-item.is-open').each(function() {
                        var $openItem = $(this);
                        $openItem.removeClass('is-open');
                        $openItem.find('.faq-answer').stop(true, true).slideUp(220);
                        $openItem.find('.faq-toggle-icon i').removeClass('fa-minus').addClass(
                            'fa-plus');
                    });

                    $item.addClass('is-open');
                    $answer.stop(true, true).slideDown(220);
                    $icon.removeClass('fa-plus').addClass('fa-minus');
                });
            });
        })(jQuery);
    </script>
@endsection
