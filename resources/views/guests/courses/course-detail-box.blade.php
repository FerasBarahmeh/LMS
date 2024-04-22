<div class="course-detail-bx">

    @if(user()->service()->isNotEnrolled($course->id))
        <div class="course-price price">
            <h4  @class(['price text-capitalize', 'free' => is_string($course->price)])>{{  ! is_string($course->price) ? Currency::name($course->setting->currency) . ' ' .  $course->price : $course->price }}</h4>
        </div>
        <div class="course-buy-now text-center">
            <form action="{{ route('enrollments.enroll', $course->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn radius-xl text-uppercase">Buy Now This Courses</button>
            </form>
        </div>
    @else
        <h4  @class(['price text-capitalize'])>
            <a href="#">Go to Curriculum</a>
        </h4>
    @endif

    <div class="teacher-bx">
        <div class="teacher-info">
            <div class="teacher-thumb">
                <img src="{{ $course->user->service()->profilePicture()}}" alt=""/>
            </div>
            <div class="teacher-name">
                <h5>{{ $course->user->name }}</h5>
                <span class="text-capitalize">{{ $course->category->name }} teacher</span>
            </div>
        </div>
    </div>
    <div class="cours-more-info">
        <div class="review">
            <span>3 Review</span>
            <ul class="cours-star">
                <li class="active"><i class="fa fa-star"></i></li>
                <li class="active"><i class="fa fa-star"></i></li>
                <li class="active"><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
            </ul>
        </div>
        <div class="price categories">
            <span>Categories</span>
            <h5 class="text-primary">{{ $course->category->name }}</h5>
        </div>
    </div>
    <div class="course-info-list scroll-page">
        <ul class="navbar">
            <li><a class="nav-link" href="#overview"><i class="ti-zip"></i>Overview</a></li>
            <li><a class="nav-link" href="#curriculum"><i class="ti-bookmark-alt"></i>Curriculum</a></li>
            <li><a class="nav-link" href="#instructor"><i class="ti-user"></i>Instructor</a></li>
            <li><a class="nav-link" href="#reviews"><i class="ti-comments"></i>Reviews</a></li>
        </ul>
    </div>
</div>
