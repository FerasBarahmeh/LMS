@props([
    'content' => null,
])

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary ']) }}>
    {{ $content ?? $slot  }}
</button>
