<div>
    <div class="lecture item border p-2">
        <div class="border-bottom w-100">
            <div class="d-flex justify-content-between align-items-center gap-5 p-1">
                <div class="d-flex align-items-center gap-5">
                    <span class="tx-9 bg-dark text-white d-flex align-items-center p-2 rad-half">
                         <i class="fa fa-check"></i>
                    </span>

                    <div class="d-flex gap-5 align-items-center">

                        @if($editNameStage)
                            <!-- Lecture name  -->
                            <div class="d-flex justify-content-between align-items-center gap-10">
                                <span class="text-muted">Lecture:</span>
                                <x-text-input wire:model="lectureName"
                                              placeholder="lecture name" @style(['height: 30px;'])/>
                            </div>

                            <!-- Lecture name buttons -->
                            <div class="buttons">
                                <x-primary-button class="bg-transparent text-success p-0" wire:click="addName">
                                    <i class="icon icon-check"></i>
                                </x-primary-button>
                                <x-primary-button class="bg-transparent text-danger p-0"
                                                  wire:click="toggleEditNameStage">
                                    <i class="icon icon-close"></i>
                                </x-primary-button>
                            </div>
                        @else
                            <!-- Show lecture name -->
                            {{ $lectureName ?? 'Chose name for lecture' }}
                            <x-primary-button class="bg-transparent text-success p-0" wire:click="toggleEditNameStage">
                                <i class="fa fa-edit"></i>
                            </x-primary-button>
                        @endif
                    </div>
                </div>

                <!-- Lecture  options -->
                <div class="buttons">
                    <x-primary-button class="bg-transparent  text-dark p-0">
                        <i class="fa fa-plus"></i>
                    </x-primary-button>
                    <x-primary-button class="bg-transparent text-danger p-0" wire:click="refresh">
                        <i class="fa fa-trash"></i>
                    </x-primary-button>
                </div>
            </div>
        </div>

        @if($addContentStage)
            <div class="content">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <x-input-label :content="'Upload lecture video'"/>
                        <x-filepond :name="'lecture_video'"  :accept="['video/*']"/>
                    </div>
                </form>
            </div>
        @endif
    </div>
</div>
