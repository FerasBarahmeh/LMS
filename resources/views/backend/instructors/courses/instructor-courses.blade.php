<div>
    <div class="card custom-card card-img-top-1">
        <figure>
            <img class="card-img-top w-100 w-100"
                 src="{{ asset('img/courses/empty.png') }}" alt="">
        </figure>
        <div class="card-body pb-0">
            <a href="{{ route('instructor.courses.manage.curriculum', $course->id) }}">
                <h4 class="card-title">{{ $course->name }}</h4>
            </a>
            <p class="mb-2">Those who do not know how pursues or desires to occur in
                which toil and pain can procure him some great pleasure. To take a
                trivial example pain was born and I will give you a complete account of
                the system, and expound the actual teachings of the great explorer of
                the truth, the master-buil .the great explorer of the truth, the
                master-buil</p>
        </div>
        <div
            class="item7-card-desc d-flex p-3 pt-0 align-items-center justify-content-center border-top">
            <div class="main-img-user online">
                <figure>
                    <img alt="avatar" src="{{ $course->user->media->first()->getUrl()  }}">
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
