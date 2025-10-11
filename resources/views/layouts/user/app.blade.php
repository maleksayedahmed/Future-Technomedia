<!DOCTYPE HTML>
<html lang="en">

    @include('layouts.user.components.head')

    <body>
        <!--loader-->
        <div class="loader-wrap">
            <div class="pin"></div>
        </div>
        <!--loader end-->
        <!-- Main  -->
        <div id="main">

            @include('layouts.user.components.header')
            @include('layouts.user.components.navigation')

            <!-- wrapper-->
            <div id="wrapper" class="@yield('wrapper_class')">
            {{-- <div id="wrapper" class="{{ isset($__data['class']) ? $__data['class'] : '' }}"> --}}

                @yield('content')


                @include('layouts.user.components.footer')

                @includeIf('components.floating-contact')
            </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/plugins.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/scripts.js')}}"></script>
        @yield('js')
    </body>
</html>
