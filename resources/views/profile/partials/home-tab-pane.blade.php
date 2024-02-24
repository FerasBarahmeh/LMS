<div class="tab-pane active" id="home">
    <h4 class="tx-15 text-uppercase mb-3">BIOdata</h4>
    <p class="m-b-5">{{ user()->about }}</p>
    <div class="m-t-30">
        <h4 class="tx-15 text-uppercase mt-3 mb-3">Experience</h4>

        @foreach(user()->experiences as $experience)
            <div class="experience p-t-10 p-l-1 position-relative" >
                <h5 class="text-dark m-b-5 tx-14">{{ $experience->job_title }}</h5>
                <p class="text-muted">{{ $experience->company_name }}</p>
                <p class="position-absolute r-0 t-0">
                    <span class="tx-10">{{ $experience->joined_date }}</span>
                    <b>To</b>
                    <span class="tx-10">{{ $experience->leave_date }}</span>
                </p>
                <p class="text-muted tx-13 m-b-0">{{ $experience->job_description }}</p>
            </div>
            <hr/>
        @endforeach
    </div>
</div>

@push('css')
    <link rel="stylesheet" href="{{ asset('css/experience.css') }}">
@endpush
