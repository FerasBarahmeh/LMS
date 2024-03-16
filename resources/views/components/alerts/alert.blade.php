@props(['success' => null, 'fail' => null, 'type' => null, 'showTime' => 2000,])


@if(isset($success) )
    <x-alerts.success :message="$success"/>
@elseif(isset($fail))
    <x-alerts.success :message="$fail"/>
@endif

<span id="alert-scroll"></span>

<script>
    if ({{  $success != null || $fail != null ? 'true' : 'false' }}) {
        document.getElementById('alert-scroll').scrollIntoView({
            behavior: 'smooth',
            block: 'start',
            inline: 'nearest',
        });
    }
</script>
