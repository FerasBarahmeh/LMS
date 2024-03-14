<x-modal id="lecture-description-{{$lecture->id}}">
    <!-- Modal head -->
    <div class="modal-header">
        <h6 class="modal-title">
            Description <q class="text-primary">{{ $lecture->name }}</q>
        </h6>
        <x-close-modal-header-button/>
    </div>

    <!-- Modal Body -->
    <div class="modal-body">

        <h2 class="text-dark">
            {{ __('Change description to :name lecture', [$lecture->name]) }}
        </h2>

        <p>{{ __('Craft clear and actionable description for the lecture Course Box by defining specific learning outcomes and goals. Consider the knowledge or skills participants should acquire, and ensure that each objective contributes to a cohesive and comprehensive learning experience within this section. Keep in mind the overall course description to maintain alignment with the broader educational goals.') }}</p>

        <!-- Description -->
        <div class="mt-6">
            <x-input-label for="description" value="{{ __('description') }}" class="mt-3 mb-0 text-primary"/>
            <x-textarea-input wire:model="description">{{ $lecture->description }}</x-textarea-input>
            <x-input-error :messages="$errors->get('description')" class="mt-2"/>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
            <x-close-modal-footer-button
                wire:click="changeDescription"
                class="bg-dark text-white"
            >
                {{ __('change') }}
            </x-close-modal-footer-button>
            <x-close-modal-footer-button>{{ __('close') }}</x-close-modal-footer-button>
        </div>

    </div>
</x-modal>
