@props([
    'id',
    'edit' => true,
    'eye' => true,
    'toggle' => true,
    'delete' => true,
    'status' => null,
])

<div class="options" @style(['display: flex; gap: 7px;'])>
{{--    @if($edit)--}}

{{--        <x-modals.buttons.horizontal :dataEffect="'edit-'.$id" class="p-0 bg-transparent "--}}
{{--                                     data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Information">--}}
{{--            <i class="fa fa-edit text-success"></i>--}}
{{--        </x-modals.buttons.horizontal>--}}
{{--    @endif--}}

    @if($eye)
        <x-modals.buttons.horizontal :dataEffect="'show-info-'.$id" class="p-0 bg-transparent "
                                     data-bs-toggle="tooltip" data-bs-placement="top" title="Information">
            <i class="fa fa-eye text-primary"></i>
        </x-modals.buttons.horizontal>

    @endif

    @if($toggle && $status != null)
        @if($status == Status::Active->value)
            @php $typeToggle = 'on' @endphp
        @else
                @php $typeToggle = 'off' @endphp
        @endif
        <x-modals.buttons.horizontal :dataEffect="'toggle-status'.$id" class="p-0 bg-transparent "
                                     data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $typeToggle === 'on' ? 'Be Inactive' : 'Be Active' }}">
            <i class="fa fa-toggle-{{ $typeToggle }} text-warning"></i>
        </x-modals.buttons.horizontal>

    @endif

    @if($delete)
            <x-modals.buttons.horizontal :dataEffect="'delete-'.$id" class="p-0 bg-transparent "
                                         data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Instructor">
                <i class="fa fa-trash text-danger"></i>
            </x-modals.buttons.horizontal>
    @endif
</div>
