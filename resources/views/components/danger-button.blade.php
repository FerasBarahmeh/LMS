@props(['content'])
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn ripple btn-danger']) }}>
    {{ $content ?? $slot  }}
</button>
