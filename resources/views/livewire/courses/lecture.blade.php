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
                        <i class="fa fa-{{ $addContentStage ? 'minus' : 'plus' }}"
                           wire:click="openAddContentSection"></i>
                    </x-primary-button>
                    <x-primary-button class="bg-transparent text-danger p-0" wire:click="refresh">
                        <i class="fa fa-trash"></i>
                    </x-primary-button>
                </div>
            </div>
        </div>

        @if($addContentStage)
            <div class="content">

                <div class="mb-3 mt-3">
                    <x-alerts.alert :success="session('upload-lesson-success')"/>
                    <div
                        x-data="{ isUploading: false, progress: 0 }"
                        x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false, $wire.uploadCompleted()"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                    >
                        @if (! $lessonFile)
                            <x-input-file wire:model="lessonFile" x-show="! isUploading" title="upload lesson"/>
                        @endif



                        <!-- Progress Bar -->
                        <div x-show="isUploading">
                            <div class="mg-b-10 mt-3 mb-3 w-100">
                                <progress max="100" x-bind:value="progress" class="w-100"></progress>
                            </div>
                        </div>

                    </div>

                    <x-input-error :messages="$errors->get('lessonFile')" class="mt-2"/>

                    @if ($lessonFile)
                        <video controls @class(['w-100 mt-3']) @style(['height: 500px']) loop="loop" poster="">
                            <source src="{{ $lessonFile->temporaryUrl() }}" type="video/mp4">
                        </video>
                    @endif
                </div>

            </div>
        @endif
    </div>
</div>
