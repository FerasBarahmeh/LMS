@props([
    'value' => null,
    'selected' => false,
    'content' => null,
])

<option {!! $attributes->merge(['class' => 'text-capitalize', 'value' => $value]) !!} {{ $selected ? 'selected' : '' }}>{{ \Illuminate\Support\Str::ucfirst($content ?? $slot)  }}</option>
