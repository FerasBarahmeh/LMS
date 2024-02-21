
<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="index.html"><img src="{{ asset('img/logo-light.png') }}" class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="index.html"><img src="{{ asset('img/logo-lms.png') }}" class="main-logo dark-theme" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="index.html"><img src="{{ asset('img/logo-lms.png') }}" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="index.html"><img src="{{ asset('img/logo-lms.png') }}" class="logo-icon dark-theme" alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround profile-picture-uploaded" src="{{ phantomImagePicker(user()->getFirstMediaUrl(Collection::Users->value) ) }}"/>

                    <span class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{ auth()->user()->name }}</h4>
                    <span class="mb-0 text-muted">{{ Str::ucfirst(auth()->user()->privilege) }}</span>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="side-item side-item-category">Main</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-chart-line mr-2 ml-2 "></i>
                    <span class="side-menu__label">Dashboard</span>
                </a>
            </li>
            <li class="side-item side-item-category">General</li>
            <!-- Users -->
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fa fa-user ml-2 mr-2"></i>
                    <span class="side-menu__label">Users</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item text-capitalize" href="{{ route('admin.users.all') }}">show all</a>
                        <a class="slide-item text-capitalize" href="{{ route('admin.users.instructors') }}">instructors</a>
                        <a class="slide-item text-capitalize" href="{{ route('admin.users.students') }}">students</a>
                    </li>
                </ul>
            </li>

            <!-- Available Platforms -->
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fa fa-layer-group ml-2 mr-2"></i>

                    <span class="side-menu__label">Available Platforms</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item text-capitalize" href="{{ route('platforms.index') }}">show all</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</aside>
<!-- main-sidebar -->
