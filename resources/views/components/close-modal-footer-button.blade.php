<button
    {{ $attributes->merge(['class' => 'btn ripple btn-secondary text-capitalize', 'type' => 'button']) }}
    data-dismiss="modal"
>
    {{ $slot ?? 'Cancel' }}
</button>
