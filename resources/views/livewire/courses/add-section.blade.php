<div>
    <div
        @class(['card-header', 'd-flex', 'align-items-center', 'justify-content-between'])
        @style(['box-shadow: 5px 7px 26px -5px #cdd4e7;'])
    >
        <h5 class="m-0 text-dark">Sections</h5>
        <x-primary-button wire:click="openAddSectionBody" @class(['pt-1 pb-1 d-flex align-item-center justify-content-center'])>
            <i class="fa fa-{{ $addSectionBodyOpen ? 'minus' : 'plus' }}"></i>
        </x-primary-button>
    </div>

    <section @class(['card-body', 'd-none' => ! $addSectionBodyOpen])>
        <!-- Title -->
        <div class="mb-3">
            <x-input-label for="title" :value="'title'" class="text-muted tx-12"/>
            <x-text-input wire:model="title"/>
            <x-input-error :messages="$errors->get('title')" class="mt-2"/>
        </div>

        <!-- Objective -->
        <div class="mb-3">
            <x-input-label for="objective" :value="'What will students be able to do at the end of this section?'"
                           class="text-muted tx-12"/>
            <x-textarea-input placholder="Enter learning objective" name="objective">{{ $objective }}</x-textarea-input>
            <x-input-error :messages="$errors->get('objective')" class="mt-2"/>
        </div>

        <!-- Save -->
        <div class="card-footer border-top-0 p-0 d-flex align-items-center justify-content-end" @style(['gap: 10px;'])>
            <x-secondary-button wire:click="openAddSectionBody">{{__('close')}}</x-secondary-button>
            <x-primary-button wire:click="save">{{__('save')}}</x-primary-button>
        </div>
    </section>


    @if($saved)
        <p class="alert alert-info rad-5 box-shadow-info p-2 mt-2 mb-2">Custom this section</p>
        <livewire:courses.section-edition-slug :section="$section" :course="$course"/>
    @endif
</div>
