<x-app-layout :title="$course->name . ' Curriculum | LSM'">
    <x-slot name="content">
        @include('backend.instructors.courses.alerts')
        <div class="row">
            <div class="col-xl-12">
                <div class="card mg-b-20">
                    @include('backend.instructors.courses.layouts.card-header')

                    @include('backend.instructors.courses.layouts.alerts-form-errors-container')

                    <div class="card-body">

                        <!-- Content -->
                        <div class="d-md-flex" @style(['gap: 10px;'])>
                            <!-- Left Side page-->
                            @include('backend.instructors.courses.layouts.tab-buttons')

                            <div class="tabs-style-4 w-100">
                                <div class="tab-content" @style(['box-shadow: 5px 7px 26px -5px #cdd4e7;'])>
                                    @yield('content')
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
