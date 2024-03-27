<x-guest-layout :title="'Courses'">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark"
         style="background-image:url({{ asset('guest/assets/images/banner/banner3.jpg') }});">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Our Courses</h1>
            </div>
        </div>
    </div>
    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="#">Home</a></li>
                <li>Our Courses</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb row END -->
    <!-- inner page banner END -->
    <div class="content-block">
        <!-- About Us -->
        <div class="section-area section-sp1">
            <div class="container">
                <div class="row">
                    @if($courses->isNotEmpty())
                        <div class="col-lg-3 col-md-4 col-sm-12 m-b30">
                            <div class="widget courses-search-bx placeani">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label>Search Courses</label>
                                        <input name="dzName" type="text" required class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="widget widget_archive">
                                <h5 class="widget-title style-1">Categories</h5>
                                <ul>
                                    <li class="active"><a href="#">all</a></li>
                                    @each('guests.courses.categories', $categories, 'category')
                                </ul>
                            </div>
                            <div class="widget recent-posts-entry widget-courses">
                                <h5 class="widget-title style-1">Recent Courses</h5>
                                <div class="widget-post-bx">
                                    @each('guests.courses.recentCourses', $recentCourses, 'recentCourse')
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-8 col-sm-12">
                                <div class="row">
                                    @each('guests.courses.courses', $courses, 'course')
                                    <div class="col-lg-12 m-b20">
                                        {{ $courses->links('vendor.pagination.guest') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <figure class="col-lg-3 col-md-4 col-sm-12 d-flex flex-column gap-10">
                            <img src="{{ asset('img/svgicons/banner-img.svg') }}" alt="not found courses">
                            <figcaption class="mt-5 align-self-center">Not Course yet</figcaption>
                        </figure>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <!-- contact area END -->
</x-guest-layout>
