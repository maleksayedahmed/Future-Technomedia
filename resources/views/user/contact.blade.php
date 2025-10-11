@extends('layouts.user.app')
@section('css')
<style>
    .fw-map-container {
        position: relative;
        width: 100%;
        margin-bottom: 30px;
    }
    .map-container {
        position: relative;
        width: 100%;
        height: 450px;
        border-radius: 4px;
        overflow: hidden;
    }
    #singleMap {
        width: 100%;
        height: 100%;
        min-height: 450px;
    }
</style>
@endsection
@section('content')
    <div class="content">
        <div class="single-page-decor"></div>
        <div class="single-page-fixed-row">
            <div class="scroll-down-wrap">
                <div class="mousey">
                    <div class="scroller"></div>
                </div>
                <span>Scroll Down</span>
            </div>
            <a href="{{ route('home') }}" class="single-page-fixed-row-link"><i class="fal fa-arrow-left"></i> <span>Back to
                    home</span></a>
        </div>
        <!-- section-->
        <section class="parallax-section dark-bg sec-half parallax-sec-half-right" data-scrollax-parent="true">
            <div class="bg par-elem" data-bg="images/bg/1.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay"></div>
            <div class="pattern-bg"></div>
            <div class="container">
                <div class="section-title">
                    <h2>{{ $contactSettings['contact_hero_title'] ?? 'My' }}</h2>
                    <p>{{ $contactSettings['contact_hero_description'] ?? 'If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.' }}</p>
                    <div class="horizonral-subtitle"><span>{{ $contactSettings['contact_hero_subtitle'] ?? 'Contacts' }}</span></div>
                </div>
            </div>
            <a href="#sec1" class="custom-scroll-link hero-start-link"><span>Let's Start</span> <i
                    class="fal fa-long-arrow-down"></i></a>
        </section>
        <!-- section end-->
        <!-- section end-->
        <section data-scrollax-parent="true" id="sec1">
            <div class="section-subtitle" data-scrollax="properties: { translateY: '-250px' }">Get in Touch<span>//</span>
            </div>
            <div class="container">
                <!-- contact details -->
                <div class="fl-wrap   mar-bottom">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="pr-title fl-wrap">
                                <h3>{{ $contactSettings['contact_details_title'] ?? 'Contact Details' }}</h3>
                                <span>{{ $contactSettings['contact_details_subtitle'] ?? 'Lorem Ipsum generators on the Internet king this the first true generator' }}</span>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <!-- features-box-container -->
                            <div class="features-box-container single-serv fl-wrap">
                                <div class="row">
                                    <!--features-box -->
                                    <div class="features-box col-md-4">
                                        <div class="time-line-icon">
                                            <i class="fal fa-mobile-android"></i>
                                        </div>
                                        <h3>01. Phone</h3>
                                        <a href="tel:{{ $contactSettings['contact_phone'] ?? '+489756412322' }}">{{ $contactSettings['contact_phone'] ?? '+489756412322' }}</a>
                                    </div>
                                    <!-- features-box end  -->
                                    <!--features-box -->
                                    <div class="features-box col-md-4">
                                        <div class="time-line-icon">
                                            <i class="fal fa-compass"></i>
                                        </div>
                                        <h3>02. Location</h3>
                                        <a href="#">{{ $contactSettings['contact_address'] ?? 'USA 27TH Brooklyn NY' }}</a>
                                    </div>
                                    <!-- features-box end  -->
                                    <!--features-box -->
                                    <div class="features-box col-md-4">
                                        <div class="time-line-icon">
                                            <i class="fal fa-envelope-open"></i>
                                        </div>
                                        <h3>03. Email</h3>
                                        <a href="mailto:{{ $contactSettings['contact_email'] ?? 'yourmail@domain.com' }}">{{ $contactSettings['contact_email'] ?? 'yourmail@domain.com' }}</a>
                                    </div>
                                    <!-- features-box end  -->
                                </div>
                            </div>
                            <!-- features-box-container end  -->
                        </div>
                    </div>
                </div>
                <!-- contact details end  -->
                <div class="fw-map-container fl-wrap mar-bottom">
                    <div class="map-container">
                        <!-- Embedded Google Map (No API Key Required) -->
                        <iframe
                            src="{{ $contactSettings['contact_map_embed_url'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d924237.7098003947!2d46.28065179453125!3d24.72422534946569!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f03890d489399%3A0xba974d1c98e79fd5!2sRiyadh%20Saudi%20Arabia!5e0!3m2!1sen!2s!4v1234567890123!5m2!1sen!2s' }}"
                            width="100%"
                            height="450"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>

                        <!-- Alternative: Custom Map with API (Uncomment and add your API key above) -->
                        <!-- <div id="singleMap" data-latitude="{{ $contactSettings['contact_map_latitude'] ?? '24.7136' }}" data-longitude="{{ $contactSettings['contact_map_longitude'] ?? '46.6753' }}"
                            data-mapTitle="{{ $contactSettings['contact_address'] ?? 'Riyadh, Saudi Arabia' }}"></div> -->
                    </div>
                </div>
                <!--  map end  -->
                <div class="fl-wrap mar-top">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="pr-title fl-wrap">
                                <h3>{{ $contactSettings['contact_form_title'] ?? 'Get In Touch' }}</h3>
                                <span>{{ $contactSettings['contact_form_subtitle'] ?? 'Lorem Ipsum generators on the Internet king this the first true generator' }}</span>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div id="contact-form">
                                @if(session('success'))
                                    <div class="alert alert-success" style="background:#d4edda;border:1px solid #c3e6cb;color:#155724;padding:12px;border-radius:4px;margin-bottom:20px;">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if($errors->any())
                                    <div class="alert alert-danger" style="background:#f8d7da;border:1px solid #f5c6cb;color:#721c24;padding:12px;border-radius:4px;margin-bottom:20px;">
                                        <ul class="mb-0">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div id="message"></div>
                                <form class="custom-form" action="{{ route('contact.store') }}" method="POST" name="contactform" id="contactform">
                                    @csrf
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><i class="fal fa-user"></i></label>
                                                <input type="text" name="name" id="name"
                                                    placeholder="Your Name *" value="" />
                                            </div>
                                            <div class="col-md-6">
                                                <label><i class="fal fa-envelope"></i> </label>
                                                <input type="text" name="email" id="email"
                                                    placeholder="Email Address *" value="" />
                                            </div>
                                            <div class="col-md-6">
                                                <label><i class="fal fa-mobile-android"></i> </label>
                                                <input type="text" name="phone" id="phone" placeholder="Phone (Optional)"
                                                    value="" />
                                                    {{-- // Unbind theme keyup handler that hides #message
                                                    if (typeof $ !== 'undefined') {
                                                        $('#contactform input, #contactform textarea').off('keyup');
                                                    } --}}
                                            </div>
                                            <div class="col-md-6">
                                                <select name="subject" id="subject" data-placeholder="Subject"
                                                    class="chosen-select sel-dec">
                                                    <option value="">Select Subject (Optional)</option>
                                                    <option value="Order Project">Order Project</option>
                                                    <option value="Support">Support</option>
                                                    <option value="Other Question">Other Question</option>
                                                </select>
                                            </div>
                                        </div>
                                        <textarea name="comments" id="comments" cols="40" rows="3" placeholder="Your Message:"></textarea>

                                        <div class="clearfix"></div>
                                        <button type="submit" class="btn float-btn flat-btn color-btn" id="submit">Send
                                            Message</button>
                                    </fieldset>
                                </form>
                            </div>
                            <!-- contact form  end-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-parallax-module" data-position-top="70" data-position-left="20"
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
                        <h3>{{ $contactSettings['contact_social_title'] ?? 'Find me on social networks :' }}</h3>
                    </div>
                    <div class="col-md-4">
                        <ul>
                            @if(!empty($socialSettings['social_facebook']) && $socialSettings['social_facebook'] !== '#')
                                <li><a href="{{ $socialSettings['social_facebook'] }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            @endif
                            @if(!empty($socialSettings['social_instagram']) && $socialSettings['social_instagram'] !== '#')
                                <li><a href="{{ $socialSettings['social_instagram'] }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            @endif
                            @if(!empty($socialSettings['social_twitter']) && $socialSettings['social_twitter'] !== '#')
                                <li><a href="{{ $socialSettings['social_twitter'] }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            @endif
                            @if(!empty($socialSettings['social_vk']) && $socialSettings['social_vk'] !== '#')
                                <li><a href="{{ $socialSettings['social_vk'] }}" target="_blank"><i class="fab fa-vk"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- section end-->
    </div>
@endsection


@section('js')
    <!-- Google Maps API (Only needed if using custom map with markers) -->
    <!-- TODO: Replace YOUR_GOOGLE_MAPS_API_KEY with your actual Google Maps API key -->
    <!-- Get your API key from: https://console.cloud.google.com/google/maps-apis -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&libraries=places&callback=Function.prototype"></script> -->
    <!-- <script type="text/javascript" src="{{ asset('js/map.js') }}"></script> -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Helper to get cookie by name
            function getCookie(name) {
                                                                    if (typeof $ !== 'undefined') { $('#message').stop(true, true).slideDown('slow'); } else { messageDiv.style.display = 'block'; }
                const value = `; ${document.cookie}`;
                const parts = value.split(`; ${name}=`);
                if (parts.length === 2) return parts.pop().split(';').shift();
                return null;
            }
            // Ensure CSRF meta tag exists
            if (!document.querySelector('meta[name="csrf-token"]')) {
                const csrfInput = document.querySelector('input[name="_token"]');
                if (csrfInput) {
                    const meta = document.createElement('meta');
                    meta.name = 'csrf-token';
                    meta.content = csrfInput.value;
                    document.getElementsByTagName('head')[0].appendChild(meta);
                }
            }

            // Get URL parameters
                                                                    if (typeof $ !== 'undefined') { $('#message').stop(true, true).slideDown('slow'); } else { messageDiv.style.display = 'block'; }
            const urlParams = new URLSearchParams(window.location.search);
            const subject = urlParams.get('subject');
            const project = urlParams.get('project');
            const packageType = urlParams.get('package');

            // Pre-fill subject field if provided
            if (subject) {
                const subjectSelect = document.getElementById('subject');
                if (subjectSelect) {
                    // Add the custom subject as an option if it doesn't exist
                    const existingOption = Array.from(subjectSelect.options).find(option => option.value ===
                        subject);
                    if (!existingOption) {
                        const newOption = document.createElement('option');
                        newOption.value = subject;
                        newOption.textContent = subject;
                        newOption.selected = true;
                        subjectSelect.appendChild(newOption);
                    } else {
                                                                messageDiv.innerHTML = `<div class="alert alert-danger" style="background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 12px; border-radius: 4px; margin-bottom: 20px;">${errorMessage}</div>`;
                                                                if (typeof $ !== 'undefined') { $('#message').stop(true, true).slideDown('slow'); } else { messageDiv.style.display = 'block'; }
                    }
                    // Trigger change event for chosen-select
                    if (typeof $.fn.chosen !== 'undefined') {
                        subjectSelect.dispatchEvent(new Event('change'));
                        $(subjectSelect).trigger('chosen:updated');
                    }
                }
            }

            // Pre-fill message field with project info if provided
            if (project || packageType) {
                const messageTextarea = document.getElementById('comments');
                if (messageTextarea) {
                    let message = '';
                    if (project) {
                        message += `Project: ${project}\n`;
                    }
                    if (packageType) {
                        message += `Package: ${packageType}\n`;
                    }
                    message += '\nPlease provide more details about your requirements.';
                    messageTextarea.value = message;
                }
            }

            // Scroll to contact form only if there are URL parameters
            if (subject || project || packageType) {
                const contactForm = document.getElementById('contact-form');
                if (contactForm) {
                    setTimeout(() => {
                        contactForm.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        // Add a highlight effect
                        contactForm.style.boxShadow = '0 0 0 3px rgba(99, 102, 241, 0.3)';
                        setTimeout(() => {
                            contactForm.style.boxShadow = '';
                        }, 3000);
                    }, 500);
                }
            }

            // Handle form submission
            // Defensive: unbind any theme-bound jQuery handlers to avoid duplicate submits
            if (typeof $ !== 'undefined' && $('#contactform').length) {
                $('#contactform').off('submit');
            }
            const form = document.getElementById('contactform');
            const submitBtn = document.getElementById('submit');
            const messageDiv = document.getElementById('message');

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                // Basic client-side validation
                const name = document.getElementById('name').value.trim();
                const email = document.getElementById('email').value.trim();
                const comments = document.getElementById('comments').value.trim();

                if (!name || !email || !comments) {
                    messageDiv.innerHTML = `<div class="alert alert-danger" style="background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 12px; border-radius: 4px; margin-bottom: 20px;">Please fill in all required fields (Name, Email, and Message).</div>`;
                    return;
                }

                // Disable submit button
                submitBtn.disabled = true;
                submitBtn.innerHTML = 'Sending...';

                // Clear previous messages
                messageDiv.innerHTML = '';

                // Get form data
                const formData = new FormData(form);

                // Ensure CSRF token is included
                let csrfToken = document.querySelector('input[name="_token"]');
                if (csrfToken) {
                    formData.set('_token', csrfToken.value);
                } else {
                    // Fallback to meta tag
                    const metaToken = document.querySelector('meta[name="csrf-token"]');
                    if (metaToken) {
                        formData.set('_token', metaToken.getAttribute('content'));
                    }
                }

                // Debug: Log form data
                console.log('Form data being sent:');
                for (let [key, value] of formData.entries()) {
                    console.log(key, value);
                }

                // Send AJAX request using jQuery (more reliable with CSRF)
                $.ajaxSetup({
                    headers: (function(){
                        const headers = { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') };
                        const xsrf = getCookie('XSRF-TOKEN');
                        if (xsrf) {
                            headers['X-XSRF-TOKEN'] = decodeURIComponent(xsrf);
                        }
                        return headers;
                    })()
                });

                $.ajax({
                    url: form.action,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    xhrFields: { withCredentials: true },
                    success: function(data) {
                        if (data.success) {
                            messageDiv.innerHTML = `<div class="alert alert-success" style="background: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 12px; border-radius: 4px; margin-bottom: 20px;">${data.message}</div>`;
                            form.reset();
                            // Reset chosen selects if they exist
                            if (typeof $.fn.chosen !== 'undefined') {
                                $('.chosen-select').val('').trigger('chosen:updated');
                            }
                        } else {
                            let errorMsg = data.message || 'An error occurred. Please try again.';
                            if (data.errors) {
                                errorMsg += '<ul>';
                                Object.values(data.errors).forEach(errors => {
                                    errors.forEach(error => {
                                        errorMsg += `<li>${error}</li>`;
                                    });
                                });
                                errorMsg += '</ul>';
                            }
                            messageDiv.innerHTML = `<div class="alert alert-danger" style="background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 12px; border-radius: 4px; margin-bottom: 20px;">${errorMsg}</div>`;
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', xhr.responseText);
                        let errorMessage = 'An error occurred. Please try again.';

                        if (xhr.status === 419) {
                            errorMessage = 'Security token expired. Please refresh the page and try again.';
                        } else if (xhr.status === 422 && xhr.responseJSON) {
                            errorMessage = 'Please correct the following errors:<ul>';
                            if (xhr.responseJSON.errors) {
                                Object.values(xhr.responseJSON.errors).forEach(errors => {
                                    errors.forEach(err => {
                                        errorMessage += `<li>${err}</li>`;
                                    });
                                });
                            }
                            errorMessage += '</ul>';
                        }

                        messageDiv.innerHTML = `<div class="alert alert-danger" style="background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 12px; border-radius: 4px; margin-bottom: 20px;">${errorMessage}</div>`;
                    },
                    complete: function() {
                        // Re-enable submit button
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = 'Send Message';

                        // Scroll to message
                        messageDiv.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }
                });
            });
        });
    </script>
@endsection
