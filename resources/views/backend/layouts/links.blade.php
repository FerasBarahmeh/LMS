<!-- Favicon -->
<link rel="icon" href="{{ asset('img/brand/logo.ico')}}" type="image/x-icon"/>
<!--  Owl-carousel css-->
<link href="{{ asset('backend/assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!--  Custom Scroll bar-->
<link href="{{ asset('backend/assets/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
<!--  Right-sidemenu css -->
<link href="{{ asset('backend/assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
<!-- Maps css -->
<link href="{{ asset('backend/assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">

{{-- Custem --}}
<link href="{{ asset('css/style.css')}}" rel="stylesheet">
@stack('css')

@if(\Illuminate\Support\Facades\App::getLocale() == 'ar')
    <!-- Icons css -->
    <link href="{{ asset('backend/assets/css-rtl/icons.css')}}" rel="stylesheet">
    <!--- Internal Select2 css-->
    <link href="{{ asset('backend/assets/plugins/select2/css-rtl/select2.min.css') }}" rel="stylesheet">
    <!-- sidemenu css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css-rtl/sidemenu.css')}}">
    <!-- style css -->
    <link href="{{ asset('backend/assets/css-rtl/style.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css-rtl/style-dark.css')}}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{ asset('backend/assets/css-rtl/skin-modes.css')}}" rel="stylesheet" />
@else
    <!-- Icons css -->
    <link href="{{ asset('backend/assets/css/icons.css')}}" rel="stylesheet">
    <!--- Internal Select2 css-->
    <link href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/sidemenu.css')}}">
    <!-- style css -->
    <link href="{{ asset('backend/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/style-dark.css')}}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{ asset('backend/assets/css/skin-modes.css')}}" rel="stylesheet" />
@endif

@stack('css')
@stack('css-rtl')
@stack('css-ltr')
