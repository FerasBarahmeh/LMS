<div>
    <x-alerts.success :message="session('create-section-success')"/>
    <x-modal id="add-section">
        <!-- Modal head -->
        <div class="modal-header">
            <h6 class="modal-title">
                Add new section
            </h6>
            <x-close-modal-header-button/>
        </div>

        <!-- Modal Body -->
        <div class="modal-body">

            <h2 class="text-dark">
                {{ __('New section') }}
            </h2>

            <p class="mb-3">{{ __('When adding a new section to a course, it\'s crucial to ensure that it complements existing content rather than duplicating it, fostering a well-rounded learning experience. Additionally, consider student feedback and demand when selecting topics for the additional section to maximize engagement and relevance.') }}</p>

            <!-- Title -->
            <div class="mb-3">
                <x-input-label for="title" :value="'title'" class="text-muted tx-12"/>
                <x-text-input wire:model="title"></x-text-input>
                <x-input-error :messages="$errors->get('title')" class="mt-2"/>
            </div>

            <!-- Objective -->
            <div class="mb-3">
                <x-input-label for="objective" class="text-muted tx-12">
                    What will students be able to do at the end of this section?
                </x-input-label>
                <x-textarea-input placholder="Enter learning objective"
                                  name="objective">{{ $objective }}</x-textarea-input>
                <x-input-error :messages="$errors->get('objective')" class="mt-2"/>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <x-close-modal-footer-button wire:click="save" class="bg-dark text-white">
                    {{ __('change') }}
                </x-close-modal-footer-button>
                <x-close-modal-footer-button>{{ __('close') }}</x-close-modal-footer-button>
            </div>

        </div>
    </x-modal>
</div>
