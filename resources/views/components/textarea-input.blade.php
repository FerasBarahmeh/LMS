@props(['disabled' => false])

<textarea  {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-100']) !!}>{{ $slot }}</textarea>
