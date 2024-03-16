<div
    x-data="{ hasAttachment: @entangle('hasAttachments') , openAttachedSection: false , uploading: false, progress: 0 , fileType: @entangle('fileType') }"
    x-on:livewire-upload-start="uploading = true"
    x-on:livewire-upload-finish="uploading = false , $wire.uploadComplete()"
    x-on:livewire-upload-cancel="uploading = false"
    x-on:livewire-upload-error="uploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress"
>
    <!-- Error message -->
    <x-alerts.warning :message="session('already-has-lesson')"/>

    <header class="container mt-4 d-flex justify-content-between align-items-center pb-3">
        <h5 class="text-muted m-0   ">Attached files:</h5>
        <x-primary-button class="pt-0 pb-0" @click="openAttachedSection = ! openAttachedSection">
            Attached file
        </x-primary-button>
    </header>

    <!-- attached section -->
    <div x-show="openAttachedSection">
        <div class=" tab-menu-heading w-100 d-flex justify-content-between">
            <div class="tabs-menu1">
                <!-- Tabs -->
                <ul class="nav panel-tabs main-nav-line d-flex gap-5 flex-wrap">
                    <li class="w-auto">
                        <a href="#upload-video" class="active pt-2 pb-2"
                           data-toggle="tab">
                            Upload Video
                        </a>
                    </li>

                    <li class="w-auto">
                        <a href="#upload-document" class=" pt-2 pb-2" data-toggle="tab">
                            Upload Document
                        </a>
                    </li>
                </ul>
            </div>
            <x-primary-button
                class="bg-transparent"
                @click="openAttachedSection = false"
                data-toggle="tooltip" title="" data-placement="left" data-original-title="close"
            >
                <i class="si si-close text-danger"></i>
            </x-primary-button>
        </div>

        <div class="panel-body tabs-menu-body main-content-body-right border">
            <div class="tab-content">
                <!-- Progress bar -->
                <div class="progress mg-b-20" x-show="uploading">
                    <div class="progress-bar progress-bar-lg"
                         :style="`width: ${progress}%`"
                         role="progressbar"
                         aria-valuemin="0" aria-valuemax="100">
                    </div>
                </div>

                <!-- Errors -->
                <x-input-error :messages="$errors->get('videoFile')" class="mt-2"/>
                <x-input-error :messages="$errors->get('docFile')" class="mt-2"/>

                <!-- Upload Video -->
                <div class="tab-pane active" id="upload-video">
                    <!-- File input -->
                    <label x-show="! uploading" class="cursor-pointer"
                           @click="fileType = '{{ Collection::CourseVideo->value }}'">
                        <span class="d-flex gap-10 align-items-center">
                            <i class="icon icon-film text-dark tx-26"></i>
                            <span>Chose attachment (mp4)</span>
                        </span>
                        <input type="file" accept="video/mp4" wire:model="videoFile" class="d-none"/>
                    </label>
                </div>

                <!-- Upload document -->
                <div class="tab-pane" id="upload-document">
                    <!-- File input -->
                    <label x-show="! uploading" class="cursor-pointer"
                           @click="fileType = '{{ Collection::CourseDoc->value }}'">
                        <span class="d-flex gap-10 align-items-center">
                            <i class="icon icon-docs text-dark tx-26"></i>
                            <span>Chose attachment pdf document</span>
                        </span>
                        <input type="file" accept="application/pdf" wire:model="docFile" class="d-none"/>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!-- Files attached -->
    <div class="card-table-two" x-show="hasAttachment">
        <div class="table-responsive country-table">
            <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                <thead>
                <tr>
                    <th class="wd-lg-25p"></th>
                    <th class="wd-lg-25p tx-right">Type</th>
                    <th class="wd-lg-25p tx-right">Size</th>
                    <th class="wd-lg-25p tx-right">Date</th>
                    <th class="wd-lg-25p tx-right"></th>
                </tr>
                </thead>
                <tbody>
                @each('backend.instructors.courses.attachments', $lecture->attachments, 'attachment')
                </tbody>
            </table>

        </div>
    </div>
</div>
