@props([
    'dataTarget',
    'type' => 'primary',
])
<a class="btn ripple btn-{{ $type }}" data-target="#{{ $dataTarget }}" data-toggle="modal" href="">{{ $slot }}</a>
