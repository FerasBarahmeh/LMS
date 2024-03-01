<x-app-layout :title="'Courses'">
    <x-slot name="content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card mg-b-20">
                    <!-- Start header -->
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">Your Courses</h4>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                        <p class="tx-12 tx-gray-500 mb-2">
                            Find your courses hub on the instructor dashboard – the one-stop page designed just for you
                            to manage and access all your created courses.</p>
                    </div>
                    <!-- End header -->


                    <!-- Start form errors -->
                    <div class="container">
                        <x-alerts.errors/>
                    </div>
                    <!-- End form errors -->

                    <div class="card-body">
                        <!-- Start alerts -->
                        @include('backend/instructors/courses/alerts')
                        <!-- End alerts -->

                        <!-- Start header -->
                        <div class="header">
                            <!-- Add button -->
                            <div class="flex w-100">
                                <x-modals.buttons.horizontal :dataEffect="'add-course'" class="flex">
                                    <i class="fa fa-plus"></i>
                                    <span class="ml-1 mr-1">Create new course</span>
                                </x-modals.buttons.horizontal>
                                @include('backend.instructors.courses.add')
                            </div>
                        </div>
                        <!-- End header -->

                        <div class="wrapper d-grid gap-10">
                            @each('backend.instructors.courses.instructor-courses', $courses, 'course')
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </x-slot>

</x-app-layout>
