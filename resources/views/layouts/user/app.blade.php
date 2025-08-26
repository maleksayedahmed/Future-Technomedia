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
            <div id="wrapper">

                @yield('content')


                @include('layouts.user.components.footer')
            </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/plugins.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/scripts.js')}}"></script>
    </body>
</html>
