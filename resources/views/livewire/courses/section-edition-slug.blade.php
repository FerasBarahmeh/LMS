<div @class(['rad-5']) >
    <x-alerts.alert :success="session('change-objective-success')"/>
    <x-alerts.errors/>
    <section  @class([' w-100'])>
        <div @class(['d-flex align-items-center justify-content-between w-100', 'bg-gray-100'=> $loop->odd]) @style(['border-radius: 0; padding: 10px;'])>
            <!-- Title input -->
            @if($updateNameStage)
                <div class="mb-2 w-50">
                    <x-text-input wire:model="nameSection" name="title"/>
                    <x-input-error :messages="$errors->get('nameSection')" class="mt-2"/>
                </div>

                <div class="options d-flex gap-10">
                    <!-- Save new name button -->
                    <x-primary-button class="p-0 bg-transparent text-success tx-26" wire:click="saveSectionName"
                                      data-toggle="tooltip" title="save section name"><i class="icon icon-check"></i>
                    </x-primary-button>

                    <!-- Cansel save name -->
                    <x-primary-button class="p-0 bg-transparent text-danger tx-26" wire:click="toggleUpdateNameStage"
                                      data-toggle="tooltip" title="cansel"><i class="icon icon-close"></i>
                    </x-primary-button>
                </div>
            @else

                <!-- Display title -->
                <h6 class="d-flex mb-0 align-items-center justify-content-center gap-10" data-toggle="tooltip" title="" data-placement="top" data-original-title="{{ $section->published ? 'published' : 'private' }}">
                    <i class="fa fa-{{ $section->published ?  'fire text-orange' : 'eye-slash text-warning' }}"></i>
                    <x-collapse-button href="content-section-{{ $section->id }}" class="text-dark">{{ $loop->iteration }} - {{  $section->title }}</x-collapse-button>
                </h6>

                <!-- Options dropdown -->
                <div class="options d-flex gap-5">
                    <x-dropdown class="pt-1 pb-1" :direction="'up'">
                        <x-slot name="title">Options</x-slot>
                        <x-slot name="links">
                            <!-- Edit section name -->
                            <x-dropdown-link wire:click="toggleUpdateNameStage">
                                <i class="fa fa-edit"></i> Edit name
                            </x-dropdown-link>

                            <!-- Section published -->
                            <x-dropdown-link wire:click="togglePublishStatus">
                                <i class="fa fa-eye{{ $section->published ? '' : '-slash' }}"></i> {{ $section->published ? 'Publish' : 'Private' }}
                            </x-dropdown-link>

                            <!-- New lecture -->
                            <x-courses.add-lecture-button icon="plus" class="dropdown-item">New lecture</x-courses.add-lecture-button>

                            <!-- Section objective -->
                            <x-courses.edit-objective-button id="{{ $section->id }}" class="dropdown-item" icon="bullseye">objective</x-courses.edit-objective-button>

                            <!-- Delete section -->
                            <x-modals.buttons.horizontal class="bg-transparent text-danger dropdown-item"
                                                         :dataEffect="'delete-section-'.$section->id"><i
                                    class="fa fa-trash text-danger fa-15"></i> Delete section
                            </x-modals.buttons.horizontal>

                        </x-slot>
                    </x-dropdown>

                    @include('backend.instructors.courses.confirm-delete-section')
                    @include('backend.instructors.courses.objective-to-section')
                </div>
            @endif
        </div>

      @include('backend.instructors.courses.section-content')
        <livewire:courses.add-lecture :section="$section"/>
    </section>


</div>
