<!DOCTYPE html>
<html lang="en">
    <head>
        @include('backend.layouts.meta')
        <!-- Title -->
        <title> {{ $title }} </title>
        @include('backend.layouts.links')
    </head>

    <body class="main-body app sidebar-mini dark-theme">

        <!-- Loader -->
        <div id="global-loader">
            <img src="{{asset('backend/assets/img/loader.svg')}}" class="loader-img" alt="Loader">
        </div>


        <section class="page">
            @include('backend.layouts.main-aside')

            <div class="main-content app-content">
                @include('backend.layouts.main-header')
                <div class="container-fluid">
                    <!-- breadcrumb -->
                    <div class="breadcrumb-header justify-content-between">
                        <div class="left-content">
                            <div>
                                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Hi, welcome back!</h2>
                                <p class="mg-b-0">Sales monitoring dashboard template.</p>
                            </div>
                        </div>
                        <div class="main-dashboard-header-right">
                            <div>
                                <label class="tx-13">Customer Ratings</label>
                                <div class="main-star">
                                    <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star"></i> <span>(14,873)</span>
                                </div>
                            </div>
                            <div>
                                <label class="tx-13">Online Sales</label>
                                <h5>563,275</h5>
                            </div>
                            <div>
                                <label class="tx-13">Offline Sales</label>
                                <h5>783,675</h5>
                            </div>
                        </div>
                    </div>
                    <!-- /breadcrumb -->
                    {{ $content }}
                </div>

            </div>

            @include('backend.layouts.right-sidebar')

            @include('backend.layouts.footer')
        </section>


        @include('backend.layouts.scripts')
    </body>
</html>
