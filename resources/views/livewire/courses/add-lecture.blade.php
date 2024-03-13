<div>
    <x-modal id="add-lecture">
        <!-- Modal head -->
        <div class="modal-header">
            <h6 class="modal-title">
                Add new lecture for <q class="text-primary">{{ $section->title }}</q>
            </h6>
            <x-close-modal-header-button/>
        </div>

        <!-- Modal Body -->
        <div class="modal-body">

                <h2 class="text-primary">
                    {{ __('Add new lecture for :name section', [$section->title]) }}
                </h2>

                <p>{{ __('Include a supplementary lecture to enhance the course.') }}</p>

                <!-- Name -->
                <div class="mt-6">
                    <x-input-label for="name" value="{{ __('Name') }}" class="mt-3 mb-0"/>
                    <x-text-input
                        id="name"
                        wire:model="name"
                        type="text"
                        class="mt-2 mb-2"
                        placeholder="{{ __('Lecture name') }}"
                    />
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>

                <!-- Name -->
                <div class="mt-6">
                    <x-input-label for="description" value="{{ __('description') }}" class="mt-3 mb-0"/>
                    <x-textarea-input
                        id="description"
                        wire:model="description"
                        type="text"
                        class="mt-2 mb-2"
                        placeholder="{{ __('Lecture description') }}"
                    />
                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <x-close-modal-footer-button wire:click="save" class="bg-dark">{{ __('add') }}</x-close-modal-footer-button>
                    <x-close-modal-footer-button>{{ __('close') }}</x-close-modal-footer-button>
                </div>

        </div>
    </x-modal>

</div>
