@props([
    'dataEffect',  // ID for modal you want opened
    'type' => 'primary',
])

<a
    {{ $attributes->merge(['class' => 'modal-effect btn btn-'.$type.' ']) }}
   data-effect="effect-flip-horizontal"
   data-toggle="modal" href="#{{ $dataEffect }}">

    {{ $slot }}
</a>
