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
                            @foreach($dynamicMenu as $menuItem)
                                <li>
                                    <a href="{{ $menuItem->link }}"
                                    class="{{ (request()->routeIs($menuItem->route) || request()->is(ltrim($menuItem->url, '/'))) ? 'act-link' : '' }}">
                                        {{ $menuItem->title }}
                                    </a>
                                </li>
                            @endforeach

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
