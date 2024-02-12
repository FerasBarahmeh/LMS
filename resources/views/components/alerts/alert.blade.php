@props([
    'success' => null,
    'fail' => null,
    'type' => null,
    'showTime' => 2000,
])

@php

    $scroll = $success != null || $fail != null;

    if ($success !=null)
        $type = 'success';
    elseif ($fail != null)
        $type = 'danger';
@endphp

@if(isset($success) )
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
        <span class="alert-inner--text"><strong>Success!</strong>  {{ $success }}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif

@if(isset($fail) )
    <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
        <span class="alert-inner--icon"><i class="fe fe-slash"></i></span>
        <span class="alert-inner--text"><strong>Danger!</strong> {{ $fail }}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif


<script>

    if (@js($scroll)) {
        let message = document.getElementById('alert');
        message.scrollIntoView({
            behavior: 'smooth',
            block: 'start',
            inline: 'nearest',
        });
    }

</script>
