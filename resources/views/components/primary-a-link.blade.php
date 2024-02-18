@props([
    'content' => null,
])

<a {{ $attributes->merge(['type' => 'submit', 'class' => 'btn bg-gray-800 text-white ']) }}>
    {{ $content ?? $slot  }}
</a>
