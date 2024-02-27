<x-app-layout :title="'Available Platforms'">
    <x-slot name="content">
        <div class="row">
            <!--div-->
            <div class="col-xl-12">
                <div class="card mg-b-20">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">Available Platforms</h4>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                        <p class="tx-12 tx-gray-500 mb-2">They comprise the entire roster of available platforms media on your platform.</p>
                    </div>

                    <div class="card-body">
                        <!-- add button -->
                        <div class="flex w-100">
                            <x-modals.buttons.horizontal :dataEffect="'add-platform'" class="flex">
                                <i class="fa fa-plus"></i>
                                <span class="ml-1 mr-1">Add new platform</span>
                            </x-modals.buttons.horizontal>
                            @include('backend.admins.platforms.add-modal')
                        </div>
                        <!-- end add button -->

                        <div class="container">
                            <x-alerts.errors/>
                        </div>

                        <div class="table-responsive table-responsive-no-bar">
                            <table id="example1" class="table key-buttons text-md-nowrap ">
                                <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">Name</th>
                                    <th class="border-bottom-0">username</th>
                                    <th class="border-bottom-0">link</th>
                                    <th class="border-bottom-0">Options</th>
                                </tr>
                                </thead>

                                <tbody>
                                @each('backend.admins.platforms.platforms', $platforms, 'platform')
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <!--/div-->
        </div>

    </x-slot>

    @include('layouts.table-data-assets')

    @include('backend.admins.platforms.alerts')
</x-app-layout>
