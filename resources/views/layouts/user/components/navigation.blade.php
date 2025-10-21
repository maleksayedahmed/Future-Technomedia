            <!--  navigation bar -->
            <div class="nav-overlay">
                <div class="tooltip color-bg">Close Menu</div>
            </div>
            <div class="nav-holder">

                <a class="header-logo" href="{{ route('home') }}">
                    @if (setting('logo'))
                        <img src="{{ setting('logo') }}" alt="{{ setting('company_name', 'Future Technomedia') }}">
                    @else
                        <img src="{{ asset('images/logo2.svg') }}"
                            alt="{{ setting('company_name', 'Future Technomedia') }}">
                    @endif
                </a>
                <div class="nav-inner-wrap">
                    <nav class="nav-inner sound-nav" id="menu">
                        <ul>
                            <li>
                                <a href="{{ route('home') }}"
                                    class="{{ request()->is('/') ? 'act-link' : '' }} ">Home</a>

                                <!--level 2 end -->
                            </li>
                            <li>
                                <a href="{{ route('projects') }}"
                                    class="{{ request()->is('project') ? 'act-link' : '' }} ">Projects</a>
                            </li>
                            <li>
                                <a href="{{ route('blogs.index') }}"
                                    class="{{ request()->is('blogs') ? 'act-link' : '' }} ">Blogs</a>
                            </li>
                            <li>
                                <a href="{{ route('about-us') }}"
                                    class="{{ request()->is('about-us') ? 'act-link' : '' }} ">About Us</a>
                            </li>
                            <li>
                                <a href="{{ route('faq') }}"
                                    class="{{ request()->is('faq') ? 'act-link' : '' }} ">FAQs</a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}"
                                    class="{{ request()->is('contact') ? 'act-link' : '' }} ">Contact Us</a>

                            </li>

                            {{-- <li>
                                <a href="#">Pages</a>
                                <!--level 2 -->
                                <ul>
                                    <li><a href="services2.html">Services 2</a></li>
                                    <li><a href="blog-single.html">Blog single</a></li>
                                    <li><a href="team.html">Team</a></li>
                                    <li><a href="team-single.html">Team Single</a></li>
                                    <li><a href="coming-soon.html">Coming soon</a></li>
                                    <li><a href="404.html">404</a></li>
                                </ul>
                                <!--level 2 end -->
                            </li> --}}
                        </ul>
                    </nav>
                </div>
            </div>
            <!--  navigation bar end -->
