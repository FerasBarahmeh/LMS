<div>
    <x-alerts.alert :success="session('change-objective-success')"/>
    <section class="section pb-2 w-100 border-bottom" >
        <div @class(['d-flex align-items-center justify-content-between w-100']) @style(['border-radius: 0;'])>
            <!-- Title input -->
            @if($updateNameStage)
                <div class="mb-2 w-50">
                    <x-text-input wire:model="nameSection" name="title"/>
                    <x-input-error :messages="$errors->get('nameSection')" class="mt-2"/>
                </div>

                <div class="options d-flex gap-10">
                    <x-primary-button class="p-0 bg-transparent text-success tx-26" wire:click="saveSectionName" data-toggle="tooltip" title="save section name"><i class="icon icon-check"></i></x-primary-button>
                    <x-primary-button class="p-0 bg-transparent text-danger tx-26" wire:click="toggleUpdateNameStage" data-toggle="tooltip" title="cansel"><i class="icon icon-close"></i></x-primary-button>
                </div>
            @else

                <!-- Display title -->
                <h6 class="d-flex align-items-center justify-content-center gap-10">
                    <i class="fa fa-{{ $section->published ?  'fire text-orange' : 'eye-slash text-warning' }}"></i>
                    <span>{{ $section->title }}</span>
                </h6>
                <div class="options d-flex gap-5">

                    <!-- Options dropdown -->
                    <x-dropdown class="pt-1 pb-1 mb-1" :direction="'up'">
                        <x-slot name="title">Options</x-slot>
                        <x-slot name="links">
                            <x-dropdown-link wire:click="toggleUpdateNameStage"><i class="fa fa-edit"></i> Edit name</x-dropdown-link>
                            <x-dropdown-link wire:click="togglePublishStatus">@if($section->published)<i class="fa fa-eye"></i> Publish @else <i class="fa fa-eye-slash"></i> Private @endif </x-dropdown-link>
                            <x-modals.buttons.horizontal class="bg-transparent text-dark dropdown-item" :dataEffect="'objective-'.$section->id"><i class="fa fa-bullseye fa-15"></i> objective</x-modals.buttons.horizontal>
                            <x-modals.buttons.horizontal class="bg-transparent text-danger dropdown-item" :dataEffect="'delete-section-'.$section->id"><i class="fa fa-trash text-danger fa-15"></i> Delete section</x-modals.buttons.horizontal>
                        </x-slot>
                    </x-dropdown>

                    @include('backend.instructors.courses.confirm-delete-section', [$section])
                    @include('backend.instructors.courses.objective-to-section', [$section])
                </div>
            @endif
        </div>

        <div class="container">
            <p>{{ $section->objective }}</p>
        </div>
    </section>


</div>
