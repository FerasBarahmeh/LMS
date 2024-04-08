<div class="widget-post clearfix">
    <div class="ttr-post-media"><img
            src="{{ $recentCourse->service()->urlCourseImage() }}"
            width="200" height="143" alt=""></div>
    <div class="ttr-post-info">
        <div class="ttr-post-header">
            <h6 class="post-title"><a href="{{ route('courses.course', $recentCourse->id) }}">{{ $recentCourse->name }}</a></h6>
        </div>
        <div class="ttr-post-meta">
            <ul>
                <li class="price">
                    <h5 @class(['free' => is_string($recentCourse->price)])>{{ $recentCourse->price }}</h5>
                </li>
                <li class="review">03 Review</li>
            </ul>
        </div>
    </div>
</div>
