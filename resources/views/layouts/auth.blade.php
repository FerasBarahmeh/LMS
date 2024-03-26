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
    @include('auth.layouts.head-links')
</head>

<body id="bg">
<div class="page-wraper">
    <div id="loading-icon-bx"></div>
    <div class="page-content bg-white">
        <div class="account-form">
            <div class="account-head" style="background-image:url({{ asset('guest/assets/images/background/bg2.jpg);')}}">
                <a href="{{ route('home') }}"><img src="{{ asset('guest/assets/images/logo-white-2.png')}}" alt=""></a>
            </div>
            <div class="account-form-inner">
                <div class="account-container">
                    <div class="heading-bx left">
                        {{ $head }}
                    </div>

                    <!-- Form -->
                    {{ $slot }}
                </div>
            </div>
        </div>

    </div>
</div>

@include('guests.layouts.footer')
<button class="back-to-top fa fa-chevron-up"></button>
@include('guests.layouts.guest-footer-scripts')
</body>
</html>
