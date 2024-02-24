<div class="experience p-t-10 p-l-1 position-relative" >
    <h5 class="text-dark m-b-5 tx-14">{{ $experience->job_title }}</h5>
    <p class="text-muted">{{ $experience->company_name }}</p>
    <p class="position-absolute r-0 t-0">
        <span class="tx-10">{{ $experience->joined_date }}</span>
        <b>To</b>
        <span class="tx-10">{{ $experience->leave_date }}</span>
    </p>

    <div class="d-flex position-absolute r-15 b-15  text-dark" @style(['gap: 5px'])>
        <x-modals.buttons.horizontal :dataEffect="'edit-experience-'.$experience->id" class="p-0 bg-transparent text-dark" @style(['cursor: pointer;'])>
            <i class="fa fa-edit"></i>
        </x-modals.buttons.horizontal>
        <x-modals.buttons.confirm  :dataEffect="'delete-experience-'.$experience->id" class="text-danger p-0 bg-transparent " @style(['cursor: pointer;'])>
            <i class="fa fa-trash"></i>
        </x-modals.buttons.confirm >
    </div>
    <p class="text-muted tx-13 m-b-0">{{ $experience->job_description }}</p>
</div>
<hr/>
@include('profile.partials.experience.edit')
@include('profile.partials.experience.delete')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/experience.css') }}">
@endpush
