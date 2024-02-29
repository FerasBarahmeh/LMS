<!-- Start header -->
<div class="card-header pb-0">
    <div class="d-flex justify-content-between">
        <h4 class="card-title mg-b-0">
            @yield('card-title') <strong class="text-primary">{{ $course->name }}</strong> Course
        </h4>
        <i class="mdi mdi-dots-horizontal text-gray"></i>
    </div>
    <p class="tx-12 tx-gray-500 mb-2">@yield('card-hint')</p>
</div>
<!-- End header -->
