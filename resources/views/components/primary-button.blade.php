@props([
    'content' => null,
])

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn bg-gray-800 text-white ']) }}>
    {{ $content ?? $slot  }}
</button>
