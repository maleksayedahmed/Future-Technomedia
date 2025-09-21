<!-- footer-->
<div class="height-emulator fl-wrap" id="footer_ink"></div>
<footer class="main-footer fixed-footer">
    <!--footer-inner-->
    <div class="footer-inner fl-wrap">
        <div class="container">
            <div class="partcile-dec" data-parcount="90"></div>
            <div class="row">
                <div class="col-md-2">
                    <div class="footer-title fl-wrap">
                        <span>Future Technomedia</span>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="footer-header fl-wrap">{{ setting('footer_about_title', 'About Company') }}</div>
                    <div class="footer-box fl-wrap">
                        <p>{{ setting('company_description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.') }}
                        </p>
                        {{-- <a href="portfolio.html" class="btn float-btn trsp-btn">My Portfolio</a> --}}
                        <!-- footer-socilal -->
                        <div class="footer-socilal fl-wrap">
                            <ul>
                                @if (setting('social_facebook'))
                                    <li><a href="{{ setting('social_facebook') }}" target="_blank"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                @endif
                                @if (setting('social_instagram'))
                                    <li><a href="{{ setting('social_instagram') }}" target="_blank"><i
                                                class="fab fa-instagram"></i></a></li>
                                @endif
                                @if (setting('social_twitter'))
                                    <li><a href="{{ setting('social_twitter') }}" target="_blank"><i
                                                class="fab fa-twitter"></i></a></li>
                                @endif
                                @if (setting('social_vk'))
                                    <li><a href="{{ setting('social_vk') }}" target="_blank"><i
                                                class="fab fa-vk"></i></a></li>
                                @endif
                            </ul>
                        </div>
                        <!-- footer-socilal end -->
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="footer-header fl-wrap">{{ setting('footer_newsletter_title', 'Subscribe / Contacts') }}
                    </div>
                    <!-- footer-box-->
                    <div class="footer-box fl-wrap">
                        <p>{{ setting('footer_newsletter_description', 'Want to be notified when we launch a new template or an udpate. Just sign up and we\'ll send you a notification by email.') }}
                        </p>
                        <div class="subcribe-form fl-wrap">
                            <form id="subscribe" class="fl-wrap">
                                <input class="enteremail" name="email" id="subscribe-email" placeholder="email"
                                    spellcheck="false" type="text">
                                <button type="submit" id="subscribe-button" class="subscribe-button"><i
                                        class="fal fa-paper-plane"></i> Send </button>
                                <label for="subscribe-email" class="subscribe-message"></label>
                            </form>
                        </div>
                        <!-- footer-contacts-->
                        <div class="footer-contacts fl-wrap">
                            <ul>
                                @if (setting('contact_phone'))
                                    <li><i class="fal fa-phone"></i><span>Phone :</span><a
                                            href="tel:{{ setting('contact_phone') }}">{{ setting('contact_phone') }}</a>
                                    </li>
                                @endif
                                @if (setting('contact_email'))
                                    <li><i class="fal fa-envelope"></i><span>Email :</span><a
                                            href="mailto:{{ setting('contact_email') }}">{{ setting('contact_email') }}</a>
                                    </li>
                                @endif
                                @if (setting('contact_address'))
                                    <li><i class="fal fa-map-marker"></i><span>Address</span><a
                                            href="#">{{ setting('contact_address') }}</a></li>
                                @endif
                            </ul>
                        </div>
                        <!-- footer end -->
                    </div>
                    <!-- footer-box end-->
                </div>
            </div>
        </div>
    </div>
    <!--footer-inne endr-->
    <!--subfooter-->
    <div class="subfooter fl-wrap">
        <div class="container">
            <!-- policy-box-->
            <div class="policy-box">
                <span>{{ setting('footer_copyright', '© 2018 / All rights reserved.') }}</span>
            </div>
            <!-- policy-box end-->
            <a href="#" class="to-top color-bg"><i class="fal fa-angle-up"></i><span></span></a>
        </div>
    </div>
    <!--subfooter end-->
</footer>
<!-- footer end-->
<!-- contact-btn -->
<a class="contact-btn color-bg" href="{{ setting('contact_button_link', 'contacts.html') }}"><i
        class="fal fa-envelope"></i><span>{{ setting('contact_button_text', 'Get in Touch') }}</span></a>
<!-- contact-btn end -->
</div>
<!--   content end -->
<!-- share-wrapper -->
<div class="share-wrapper isShare">
    <div class="share-title"><span>Share</span></div>
    <div class="close-share soa"><span>Close</span><i class="fal fa-times"></i></div>
    <div class="share-inner soa">
        <div class="share-container"></div>
    </div>
</div>
<!-- share-wrapper end -->
