            <header class="main-header">
                <a class="logo-holder" href="/">
                @if(setting('logo'))
                    <img src="{{ setting('logo') }}" alt="{{ setting('company_name', 'Future Technomedia') }}">
                @else
                    <img src="{{ asset('images/white_logo.svg') }}" alt="{{ setting('company_name', 'Future Technomedia') }}">
                @endif
                </a>
                <!-- nav-button-wrap-->
                <div class="nav-button but-hol">
                    <span  class="nos"></span>
                    <span class="ncs"></span>
                    <span class="nbs"></span>
                    <div class="menu-button-text">Menu</div>
                </div>
                <!-- nav-button-wrap end-->
                <div class="header-social">
                    @php
                        // Fetch all settings in the 'social' group (key => value)
                        $socialSettings = settings('social');
                        // Map platform (key suffix) to Font Awesome icon classes
                        $iconMap = [
                            'facebook' => 'fab fa-facebook-f',
                            'instagram' => 'fab fa-instagram',
                            'twitter' => 'fab fa-twitter', // keep old twitter icon
                            'x' => 'fab fa-x-twitter',
                            'vk' => 'fab fa-vk',
                            'linkedin' => 'fab fa-linkedin-in',
                            'youtube' => 'fab fa-youtube',
                            'github' => 'fab fa-github',
                            'dribbble' => 'fab fa-dribbble',
                            'behance' => 'fab fa-behance',
                            'tiktok' => 'fab fa-tiktok',
                            'pinterest' => 'fab fa-pinterest-p',
                        ];
                    @endphp
                    @if($socialSettings && $socialSettings->count())
                        <ul>
                            @foreach($socialSettings as $key => $url)
                                @continue(empty($url))
                                @php
                                    $platform = \Illuminate\Support\Str::after($key, 'social_');
                                    $icon = $iconMap[$platform] ?? 'fas fa-globe';
                                @endphp
                                <li>
                                    <a href="{{ $url }}" target="_blank" rel="noopener noreferrer">
                                        <i class="{{ $icon }}"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <!--  showshare -->
                {{-- <div class="show-share showshare">
                    <i class="fal fa-retweet"></i>
                    <span>Share This</span>
                </div> --}}
                <!--  showshare end -->
            </header>
