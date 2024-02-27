<!DOCTYPE html>
<html lang="en">
<head>
    @include('backend.layouts.meta')
    <!-- Title -->
    <title> {{ $title }} </title>
    @include('backend.layouts.links')
</head>

<body class="main-body app sidebar-mini {{ auth()->user()->theme == Theme::Dim->value ? 'dark-theme' : '' }}">

<!-- Loader -->
<div id="global-loader">
    <img src="{{asset('img/brand/loader.svg')}}" class="loader-img" alt="Loader">
</div>


<section class="page">
   {{-- main aside --}}
    @include('layouts.main-aside')

    <div class="main-content app-content">
        @include('backend.layouts.main-header')
        <div class="container-fluid">
            @include('backend.layouts.breadcrumb')
            {{ $content }}
        </div>
    </div>
    @include('backend.layouts.right-sidebar')

    @include('backend.layouts.footer')
</section>


@include('backend.layouts.scripts')
</body>
</html>
