<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn ripple btn-danger']) }}>
    {{ $slot }}
</button>
