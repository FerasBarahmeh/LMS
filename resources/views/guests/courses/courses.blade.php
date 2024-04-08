<div class="col-md-6 col-lg-4 col-sm-6 m-b30">
    <div class="cours-bx">
        <div class="action-box">
            <img src="{{ $course->service()->urlCourseImage() }}" alt="">
            <a href="{{ route('courses.course', $course->id) }}" class="btn">Describe</a>
        </div>
        <div class="info-bx text-center">
            <h5><a href="#">{{ $course->name }}</a></h5>
            <span class="text-capitalize">{{ $course->category->name }}</span>
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
            <div class="price d-flex align-items-center justify-content-center">
                <h5> <span class="tx-11">{{ Currency::name($course->setting->currency)  }}</span> {{ $course->price }}</h5>
            </div>
        </div>
    </div>
</div>
