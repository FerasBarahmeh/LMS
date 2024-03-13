<div class="options d-flex gap-5 mt-4">
    <x-dropdown class="pt-1 pb-1 mb-1" :direction="'up'">
        <x-slot name="title"><i class="fa fa-bars"></i></x-slot>
        <x-slot name="links">
            <!-- Edit section name -->
            <x-modals.buttons.horizontal class="bg-transparent dropdown-item text-dark"
                                         :dataEffect="'edit-name-lecture-'.$lecture->id">
                <i class="fa fa-edit fa-15"></i>
                Edit name
            </x-modals.buttons.horizontal>

            <!-- Delete section -->
            <x-modals.buttons.horizontal class="bg-transparent text-danger dropdown-item"
                                         :dataEffect="'delete-lecture-'.$lecture->id"><i
                    class="fa fa-trash text-danger fa-15"></i> Delete Lecture
            </x-modals.buttons.horizontal>
        </x-slot>
    </x-dropdown>

    @include('backend.instructors.courses.edit-lecture-name')
    @include('backend.instructors.courses.confirm-delete-lecture')
</div>
