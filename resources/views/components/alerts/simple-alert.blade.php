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
    <div class="alert alert-success" role="alert">
        {{ $success }}
    </div>
@endif

@if(isset($fail) )
    <div class="alert alert-danger" role="alert">
        {{ $fail }}
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
