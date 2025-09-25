    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>FutureTechnomedia</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--=============== css  ===============-->
        <link type="text/css" rel="stylesheet" href="{{asset('css/reset.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('css/plugins.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('css/color.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        @yield('css')
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    </head>
