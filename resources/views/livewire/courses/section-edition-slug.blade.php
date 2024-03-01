<div>
    <section class="section w-100">
        <div
            class="header d-flex align-items-center justify-content-between w-100 border-bottom" @style(['border-radius: 0;'])>
            @if($updateNameStage)
                <div class="mb-2 w-100">
                    <x-text-input wire:model="nameSection" name="title"/>
                    <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                </div>

                <div class="options d-flex gap-5 pl-5 pr-5">
                    <x-primary-button class="p-0 bg-transparent text-success" wire:click="saveSectionName">
                        <i class="fa fa-check"></i>
                    </x-primary-button>
                    <x-primary-button class="txt-15 p-0 bg-transparent text-danger" wire:click="toggleUpdateNameStage">
                        <span>&times;</span>
                    </x-primary-button>
                </div>
            @else
                <h6>{{ $section->title }}</h6>
                <div class="options d-flex gap-5 pl-5 pr-5">
                    <x-primary-button class="p-0 bg-transparent text-dark" wire:click="toggleUpdateNameStage">
                        <i class="fa fa-edit"></i>
                    </x-primary-button>
                    <x-primary-button class="p-0 bg-transparent text-dark">
                        <i class="fa fa-plus"></i>
                    </x-primary-button>
                </div>
            @endif
        </div>
    </section>


</div>
