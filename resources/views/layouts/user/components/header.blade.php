            <header class="main-header">
                <a class="logo-holder" href="/">
                @if(setting('logo'))
                    <img src="{{ setting('logo') }}" alt="{{ setting('company_name', 'Future Technomedia') }}">
                @else
                    <img src="{{ asset('images/white_logo.svg') }}" alt="{{ setting('company_name', 'Future Technomedia') }}">
                @endif
                </a>
                <!-- nav-button-wrap-->
                {{-- <div class="nav-button but-hol">
                    <span  class="nos"></span>
                    <span class="ncs"></span>
                    <span class="nbs"></span>
                    <div class="menu-button-text">Menu</div>
                </div> --}}
                <!-- nav-button-wrap end-->
                <div class="header-social">
                    <ul >
                        @if(setting('social_facebook'))
                            <li><a href="{{ setting('social_facebook') }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        @endif
                        @if(setting('social_instagram'))
                            <li><a href="{{ setting('social_instagram') }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        @endif
                        @if(setting('social_twitter'))
                            <li><a href="{{ setting('social_twitter') }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        @endif
                        @if(setting('social_vk'))
                            <li><a href="{{ setting('social_vk') }}" target="_blank"><i class="fab fa-vk"></i></a></li>
                        @endif
                    </ul>
                </div>
                <!--  showshare -->
                {{-- <div class="show-share showshare">
                    <i class="fal fa-retweet"></i>
                    <span>Share This</span>
                </div> --}}
                <!--  showshare end -->
            </header>
