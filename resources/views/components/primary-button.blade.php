
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary ']) }} @style(['width: 100%;'])>
    {{ $slot }}
</button>
