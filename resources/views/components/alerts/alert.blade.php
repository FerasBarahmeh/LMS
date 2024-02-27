@props(['success' => null, 'fail' => null, 'type' => null, 'showTime' => 2000,])

@php
    $scroll = $success != null || $fail != null;
    $type = $success != null ? 'success' : 'danger';
@endphp

@if(isset($success) )
    <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between align-items-center" role="alert">
        <div class="d-flex" @style(['gap: 7px;'])>
            <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
            <span class="alert-inner--text"><strong class="text-capitalize">{{ __('common.success') }} ! </strong>  {{ ' ' . $success }}</span>
        </div>

        <button type="button" class="close p-1  position-relative" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(isset($fail) )
    <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-between align-items-center" role="alert" >
        <div class="d-flex" @style(['gap: 7px;'])>
            <span class="alert-inner--icon"><i class="fe fe-slash"></i></span>
            <span class="alert-inner--text"><strong class="text-capitalize">{{ __('common.danger') }} ! </strong> {{ ' ' . $fail }}</span>
        </div>
        <button type="button" class="close p-1 position-relative" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif

<span id="alert-scroll"></span>

<script>
    if (@js($scroll)) {
        document.getElementById('alert-scroll').scrollIntoView({
            behavior: 'smooth',
            block: 'start',
            inline: 'nearest',
        });
    }
</script>
