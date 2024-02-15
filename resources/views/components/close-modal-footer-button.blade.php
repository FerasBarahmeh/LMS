@props([
    'content'
])
<button
    {{ $attributes->merge(['class' => 'btn ripple btn-secondary text-capitalize', 'type' => 'button']) }}
    data-dismiss="modal"
>
    {{ $content ??  $slot ?? 'Cancel' }}
</button>
