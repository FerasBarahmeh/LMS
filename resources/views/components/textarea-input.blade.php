@props(['disabled' => false])

<textarea  {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-100 form-control']) !!}>{{ $slot }}</textarea>
