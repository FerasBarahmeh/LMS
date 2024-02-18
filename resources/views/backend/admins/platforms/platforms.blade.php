<tr>
    <td class="sorting_1">{{ $platform->id }}</td>
    <td>{{ $platform->name }}</td>
    <td>{{ $platform->domain }}</td>
    <td class="text-center">
        <x-modals.buttons.horizontal :dataEffect="'edit-'.$platform->id" class="p-0 bg-transparent ">
            <i class="fa fa-edit text-success"></i>
        </x-modals.buttons.horizontal>
        <x-modals.buttons.confirm :dataEffect="'confirm-delete-'.$platform->id" class="p-0 bg-transparent ">
            <i class="fa fa-trash text-danger"></i>
        </x-modals.buttons.confirm>
    </td>

</tr>
@include('backend.admins.platforms.edit-modal', [$platform])
<x-modals.modals.confirm :id="'confirm-delete-'.$platform->id" :route="route('platforms.destroy', $platform->id)"/>
