@props([
    'dataEffect',  // ID for modal you want opened
    'type' => 'bg-gray-800',
])

<a
    {{ $attributes->merge(['class' => 'modal-effect btn '.$type.' text-white ']) }}
   data-effect="effect-flip-horizontal"
   data-toggle="modal" href="#{{ $dataEffect }}">

    {{ $slot }}
</a>
