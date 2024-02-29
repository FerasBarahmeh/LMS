<x-app-layout :title="$course->name . ' Curriculum | LSM'">
    <x-slot name="content">
        @include('backend.instructors.courses.alerts')
        <div class="row">
            <div class="col-xl-12">
                <div class="card mg-b-20">
                    @include('backend.instructors.courses.layouts.card-header')

                    @include('backend.instructors.courses.layouts.alerts-form-errors-container')

                    <div class="card-body">
                        <!-- Alerts -->
                        @include('backend.instructors.courses.alerts')

                        <!-- Content -->
                        <div class="d-md-flex" @style(['gap: 10px;'])>
                            <!-- Left Side page-->
                            @include('backend.instructors.courses.layouts.tab-buttons')

                            <div class="tabs-style-4">
                                <div class="panel-body tabs-menu-body">
                                    <div class="tab-content">
                                        @yield('content')
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
