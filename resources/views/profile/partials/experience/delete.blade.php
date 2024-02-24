<x-modals.modals.confirm :id="'delete-experience-'.$experience->id" :route="route('user.delete.experience', $experience->id)">
    <x-slot name="subTitle" >
        Are you sure for delete "{{$experience->job_title }}"
    </x-slot>
    <x-slot name="tip">
        By confirming this action, you are contributing to a decreased rating for the user. Are you sure you want to proceed?
    </x-slot>
</x-modals.modals.confirm>
