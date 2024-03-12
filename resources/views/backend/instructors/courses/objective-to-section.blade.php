<x-modal id="objective-{{$section->id}}">
    <!-- Modal head -->
    <div class="modal-header">
        <h6 class="modal-title">
            objective <q class="text-primary">{{ $section->title }}</q>
        </h6>
        <x-close-modal-header-button/>
    </div>

    <!-- Modal Body -->
    <div class="modal-body">

        <h2 class="text-dark">
            {{ __('Objective to :name section', [$section->title]) }}
        </h2>

        <p>{{ __('Craft clear and actionable objectives for the Section Course Box by defining specific learning outcomes and goals. Consider the knowledge or skills participants should acquire, and ensure that each objective contributes to a cohesive and comprehensive learning experience within this section. Keep in mind the overall course objectives to maintain alignment with the broader educational goals.') }}</p>

        <!-- Objective -->
        <div class="mt-6">
            <x-input-label for="objective" value="{{ __('objective') }}" class="mt-3 mb-0 text-primary"/>
            <x-textarea-input wire:model="objective">{{ $section->objective }}</x-textarea-input>
            <x-input-error :messages="$errors->get('objective')" class="mt-2"/>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
            <x-close-modal-footer-button wire:click="changeObjective"
                                         class="bg-dark text-white">{{ __('change') }}</x-close-modal-footer-button>
            <x-close-modal-footer-button>{{ __('close') }}</x-close-modal-footer-button>
        </div>

    </div>
</x-modal>
