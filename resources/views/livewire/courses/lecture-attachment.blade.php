<div
    x-data="{ hasAttachment: @entangle('hasAttachments') , openAttachedSection: true , uploading: false, progress: 0  }"
    x-on:livewire-upload-start="uploading = true"
    x-on:livewire-upload-finish="uploading = false , $wire.uploadComplete()"
    x-on:livewire-upload-cancel="uploading = false"
    x-on:livewire-upload-error="uploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress"
>


    <header class="container d-flex justify-content-between align-items-center">
        <h5 class="text-muted m-0   ">Attached files:</h5>
        <x-primary-button class="pt-0 pb-0" @click="openAttachedSection = ! openAttachedSection">Attached file
        </x-primary-button>
    </header>

    <!-- Files attached -->
    <div class="mt-2 card-table-two" x-show="hasAttachment">
        <div class="table-responsive country-table">
            <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                <thead>
                <tr>
                    <th class="wd-lg-25p">Filename</th>
                    <th class="wd-lg-25p tx-right">Type</th>
                    <th class="wd-lg-25p tx-right">Status</th>
                    <th class="wd-lg-25p tx-right">Date</th>
                    <th class="wd-lg-25p tx-right"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>05 Dec 2019</td>
                    <td class="tx-right tx-medium tx-inverse">34</td>
                    <td class="tx-right tx-medium tx-inverse">$658.20</td>
                    <td class="tx-right tx-medium tx-danger">-$45.10</td>
                    <td class="tx-right tx-medium tx-danger cursor-pointer">Replace</td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>


    <div x-show="openAttachedSection">
        <!-- Tabs -->


        <div class=" tab-menu-heading">
            <div class="tabs-menu1">
                <!-- Tabs -->
                <ul class="nav panel-tabs main-nav-line d-flex gap-5 flex-wrap">
                    <li><a href="#upload-file" class="active pt-2 pb-2 bg-transparent border text-dark"
                           data-toggle="tab">Upload Video</a></li>
                </ul>
            </div>
        </div>
        <div class="panel-body tabs-menu-body main-content-body-right border">
            <div class="tab-content">
                <div class="tab-pane active" id="upload-file">
                    <!-- Progress bar -->
                    <div class="progress mg-b-20" x-show="! uploading">
                        <div class="progress-bar progress-bar-lg"
                             :style="`width: ${progress}%`"
                             role="progressbar"
                             aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>

                    <!-- File input -->
                    <label x-show="! uploading">
                        chose lecture video
                        <input type="file" name="videoFile" wire:model="videoFile" class="d-none"/>
                        <x-input-error :messages="$errors->get('videoFile')" class="mt-2"/>
                    </label>
                </div>
            </div>
        </div>


    </div>
</div>
