<x-app-layout :title="'Instructors'">
    <x-slot name="content">
        <div class="row">
            <!--div-->
            <div class="col-xl-12">
                <div class="card mg-b-20">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">Instructors</h4>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                        <p class="tx-12 tx-gray-500 mb-2">They comprise the entire roster of instructors on your platform.</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table key-buttons text-md-nowrap">
                                <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">Name</th>
                                    <th class="border-bottom-0">Username</th>
                                    <th class="border-bottom-0">E-mail</th>
                                    <th class="border-bottom-0">Privilege</th>
                                    <th class="border-bottom-0">Status</th>
                                    <th class="border-bottom-0">Options</th>
                                </tr>
                                </thead>

                                <tbody>
                                @each('backend.instructors.instructors', $instructors, 'instructor')
                                </tbody>
                            </table>
                            {{ $instructors->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!--/div-->
        </div>
    </x-slot>

    @include('layouts.table-data-assets')
</x-app-layout>
