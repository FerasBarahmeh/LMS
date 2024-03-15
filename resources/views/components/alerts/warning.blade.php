@props(['message'])
@if($message)
    <div class="alert alert-warning alert-dismissible fade show d-flex justify-content-between align-items-center"
         role="alert">
        <div class="d-flex" @style(['gap: 7px;'])>
            <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
            <span class="alert-inner--text"><strong class="text-capitalize">{{ __('common.warning') }} ! </strong>  {{ ' ' . $message }}</span>
        </div>

        <button type="button" class="close p-1  position-relative" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
