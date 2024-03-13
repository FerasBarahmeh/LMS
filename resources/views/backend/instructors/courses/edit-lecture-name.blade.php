<x-modal id="edit-name-lecture-{{$lecture->id}}">
    <!-- Modal head -->
    <div class="modal-header">
        <h6 class="modal-title">
            Change name <q class="text-primary">{{ $lecture->name }}</q>
        </h6>
        <x-close-modal-header-button/>
    </div>

    <!-- Modal Body -->
    <div class="modal-body">

        <h2 class="text-dark">
            {{ __('Name :name lecture', [$lecture->name]) }}
        </h2>

        <p>{{ __('Craft clear and actionable names for the Section Course Box by defining specific learning outcomes and goals. Consider the knowledge or skills participants should acquire, and ensure that each name contributes to a cohesive and comprehensive learning experience within this section. Keep in mind the overall course names to maintain alignment with the broader educational goals.') }}</p>

        <!-- Lecture name -->
        <div class="mt-6">
            <x-input-label for="name" value="{{ __('name') }}" class="mt-3 mb-0"/>
            <x-text-input wire:model="name"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
            <x-close-modal-footer-button wire:click="changeName" class="bg-dark text-white">
                {{ __('change') }}
            </x-close-modal-footer-button>
            <x-close-modal-footer-button>{{ __('close') }}</x-close-modal-footer-button>
        </div>

    </div>
</x-modal>
