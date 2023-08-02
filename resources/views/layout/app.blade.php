<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>@yield('title')</title>
        <meta name="description" content="@yield('description')" >

        <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
        <link rel="canonical" href="@yield('canonical')">

        <meta property="og:locale" content="pl_PL">
        <meta property="og:type" content="article">
        <meta property="og:title" content="@yield('title')">
        <meta property="og:description" content="@yield('description')">
        <meta property="og:url" content="@yield('canonical')">
        <meta property="og:site_name" content=" ">
        <meta property="article:publisher" content=" ">
        <meta property="article:modified_time" content=" ">
        <meta property="og:image" content="@yield('ogImage')">
        <meta property="og:image:width" content="2200">
        <meta property="og:image:height" content="1485">
        <meta property="og:image:type" content="image/jpeg">

        <link rel="shortlink" href=" ">
        <link rel="icon" href=" " sizes="32x32">
        <link rel="icon" href=" " sizes="192x192">
        <link rel="apple-touch-icon" href=" ">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
</head>
<body class="antialiased ">

    @yield('content')

    @livewireScripts
</body>
</html>