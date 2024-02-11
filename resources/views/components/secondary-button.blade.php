<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn ripple btn-secondary']) }} >
    {{ $slot }}
</button>
