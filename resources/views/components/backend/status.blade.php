@php use App\Enums\Status; @endphp
@props(['status', 'style' => 'pulse'])

@php
    $type = $status === Status::Active->value ? 'success' : 'danger';
@endphp

@if($style === 'pulse')
    <div class="text-cente  position-relative">
            <span class="text-{{ $type }} text-capitalize position-relative">
                <span class="{{ $type === 'success' ? 'pulse' : 'pulse-danger' }}" @style(['top: 50%; left: -8px; transform: translate(-50%, -50%);'])></span>
                {{ $status }}
            </span>
    </div>
@elseif($style==='badge')
    <div class="text-cente ">
            <span class="badge badge-{{ $type === 'success' ? 'pill' : 'danger' }} badge-success text-capitalize">
                {{ $status }}
            </span>
    </div>
@endif
