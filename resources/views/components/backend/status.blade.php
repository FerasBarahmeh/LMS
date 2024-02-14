@php use App\Enums\Status; @endphp
@props(['status'])


@if($status === Status::Active->value)
    <div class="relative">
        <span class="badge badge-pill badge-success text-capitalize">{{ $status }}</span>
    </div>
@elseif($status === Status::InActive->value)
    <div class="relative">
        <span class="badge badge-danger text-capitalize">{{ $status }}</span>
    </div>
@endif
