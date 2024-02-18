@props([
    'content' => null,
])

<a {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary ']) }}>
    {{ $content ?? $slot  }}
</a>
