@props([
    'id',
    'edit' => true,
    'eye' => true,
    'toggle' => true,
    'delete' => true,
    'upgrade' => false,
    'downgrade' => false,
    'status' => null,
])

<div class="options" @style(['display: flex; gap: 7px;'])>
    @if($upgrade)

        <x-modals.buttons.horizontal :dataEffect="'upgrade-'.$id" class="p-0 bg-transparent "
                                     data-bs-toggle="tooltip" data-bs-placement="top"
                                     title="Upgrade user to instructor">
            <i class="fa fa-caret-up text-success fa-15"></i>
        </x-modals.buttons.horizontal>

    @endif
    @if($downgrade)

        <x-modals.buttons.horizontal :dataEffect="'downgrade-'.$id" class="p-0 bg-transparent "
                                     data-bs-toggle="tooltip" data-bs-placement="top"
                                     title="downgrade instructor to user">
            <i class="fa fa-caret-down text-success fa-15"></i>
        </x-modals.buttons.horizontal>

    @endif

    @if($eye)

        <x-modals.buttons.horizontal :dataEffect="'show-info-'.$id" class="p-0 bg-transparent "
                                     data-bs-toggle="tooltip" data-bs-placement="top" title="Information">
            <i class="fa fa-eye text-primary"></i>
        </x-modals.buttons.horizontal>

    @endif

    @if($toggle && $status != null)

        @php $typeToggle = $status == Status::Active->value ? 'on' : 'off' @endphp

        <x-modals.buttons.horizontal :dataEffect="'toggle-status'.$id" class="p-0 bg-transparent "
                                     data-bs-toggle="tooltip" data-bs-placement="top"
                                     title="{{ $typeToggle === 'on' ? 'Be Inactive' : 'Be Active' }}">
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
