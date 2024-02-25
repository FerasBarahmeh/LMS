<x-modals.modals.confirm :id="'delete-education-'.$education->id" :route="route('user.delete.education', $education->id)">
    <x-slot name="subTitle" >
        Are you sure for delete "{{$education->education_name }}"
    </x-slot>
    <x-slot name="tip">
        By confirming this action, you are contributing to a decreased rating for the user. Are you sure you want to proceed?
    </x-slot>
</x-modals.modals.confirm>
