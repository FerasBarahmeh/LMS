<div>
    <div class="d-flex justify-content-between align-items-center" >
        <x-collapse-button href="content-lecture-{{ $lecture->id }}" class="text-dark mt-4 d-flex align-items-center gap-5">
            <i class="fa fa-{{ $lecture->published ?  'fire text-orange' : 'eye-slash text-warning' }} tx-10"></i>
            <span data-toggle="tooltip" title="" data-placement="top" data-original-title="{{ $lecture->published ? 'published' : 'private' }}">{{ $lecture->lecture_order }} - {{  $lecture->name }}</span>
        </x-collapse-button>

        @include('backend.instructors.courses.lecture-options')
    </div>
    @include('backend.instructors.courses.lecture-body')
</div>
