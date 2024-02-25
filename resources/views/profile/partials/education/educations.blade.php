<div class="experience p-t-10 p-l-1 position-relative" >
    <h5 class="text-dark m-b-5 tx-14">{{ $education->education_name }}</h5>
    <p class="text-muted">{{ $education->organization_name }}</p>
    <p class="position-absolute r-0 t-0">
        <span class="tx-10">{{ $education->start_date }}</span>
        <b>To</b>
        <span class="tx-10">{{ $education->finish_date }}</span>
    </p>

    <div class="d-flex position-absolute r-15 b-15  text-dark" @style(['gap: 5px'])>
        <x-modals.buttons.horizontal :dataEffect="'edit-education-'.$education->id" class="p-0 bg-transparent text-dark" @style(['cursor: pointer;'])>
            <i class="fa fa-edit"></i>
        </x-modals.buttons.horizontal>
        <x-modals.buttons.confirm  :dataEffect="'delete-education-'.$education->id" class="text-danger p-0 bg-transparent " @style(['cursor: pointer;'])>
            <i class="fa fa-trash"></i>
        </x-modals.buttons.confirm >
    </div>
    <p class="text-muted tx-13 m-b-0">{{ $education->description }}</p>
</div>
<hr/>
@include('profile.partials.education.edit')
@include('profile.partials.education.delete')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/experience.css') }}">
@endpush
