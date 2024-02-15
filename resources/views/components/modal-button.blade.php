@props([
    'dataTarget', // ID for modal you want opened
    'type' => 'primary',
])
<a
    {{ $attributes->merge(['class' => 'btn ripple btn-' . $type]) }}
   data-target="#{{ $dataTarget }}"
   data-toggle="modal"
   href=""
>
    {{ $slot }}
</a>
