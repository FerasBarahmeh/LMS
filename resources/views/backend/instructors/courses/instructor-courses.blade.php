<div>
    <div class="card custom-card card-img-top-1 h-100">
        <figure>
            <img class="card-img-top w-100 w-100" src="{{ asset('img/courses/img-empty.png') }}" alt="">
        </figure>
        <div class="card-body pb-0">
            <a href="{{ route('instructor.courses.edit', $course->id) }}">
                <h4 class="tx-15 mb-3 text-dark">{{ $course->name }}</h4>
            </a>
            <div class="mb-2">{!! Str::limit($course->description, 200) !!}</div>
        </div>
        <div
            class="item7-card-desc d-flex p-3 pt-0 align-items-center justify-content-center border-top">
            <div class="main-img-user online">
                <figure>
                    <img alt="avatar"
                         src="{{ $course->user->service()->profilePicture() }}">
                </figure>
            </div>
            <div class="main-contact-body">
                <h6>{{ $course->user->name }}</h6>
            </div>
            <div class="ms-auto">
                <div class="phone font-weight-semibold text-muted">
                    <span class="fe fe-calendar text-muted me-2 tx-16"></span>
                    {{ Carbon::parse($course->created_at)->diffForHumans() }}
                </div>
            </div>
        </div>
    </div>
</div>
