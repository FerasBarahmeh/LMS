<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- META ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content=""/>
    <meta name="author" content=""/>
    <meta name="robots" content=""/>

    <!-- DESCRIPTION -->
    <meta name="description" content="EduChamp : Education HTML Template"/>

    <!-- OG -->
    <meta property="og:title" content="EduChamp : Education HTML Template"/>
    <meta property="og:description" content="EduChamp : Education HTML Template"/>
    <meta property="og:image" content=""/>
    <meta name="format-detection" content="telephone=no">

    <!-- MOBILE SPECIFIC ============================================= -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- PAGE TITLE HERE ============================================= -->
    <title>{{ $title }}</title>
    @include('guests.layouts.guest-head-links')
</head>

<body id="bg">
<div class="page-wraper">
    <div id="loading-icon-bx"></div>
    @include('guests.layouts.header')
    <div class="page-content bg-white">
        {{ $slot }}
    </div>
</div>

    @include('guests.layouts.footer')
    <button class="back-to-top fa fa-chevron-up"></button>
    @include('guests.layouts.guest-footer-scripts')
</body>
</html>
