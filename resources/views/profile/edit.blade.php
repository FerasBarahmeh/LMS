<x-app-layout :title="'Dashboard'">
    <x-slot name="content">
        <!-- alert messages container -->
        @include('profile.partials.alert-messages')
        <div class="row row-sm">
            <div class="container-fluid">
                <!-- row -->
                <div class="row row-sm">
                    <!-- Col -->
                    @include('profile.partials.left-aside')

                    <!-- Col -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="">
                                        <div class="mb-2 main-content-label">Update Your information</div>
                                        <p class="tx-14 tx-gray-500 mb-2">Revitalize your data realm with the freshest, utmost
                                            precision-laden information.</p>
                                    </div>
                                    <div @style(['width: 30px; height: 30px; background-color: var(--livewire-progress-bar-color); padding: 11px; display: flex; justify-content: center; align-items: center;overflow: hidden; border-radius: 50%; color: white;'])>
                                        <i class="icon icon-arrow-up"></i>
                                    </div>
                                </div>
                                <!-- errors -->
                                <x-alerts.errors/>

                                <div aria-multiselectable="true" class="accordion" id="accordion" role="tablist">
                                    <form action="{{ route('profile.update') }}" method="post">
                                        @csrf         @method('patch')

                                        <!-- Name Card -->
                                        @include('profile.partials.collapses.name-information')
                                        <!-- End Name Card  -->

                                        <!-- Contact Card -->
                                        @include('profile.partials.collapses.contact-information')
                                        <!-- End Contact Card  -->

                                        <!-- ABOUT Card -->
                                        @include('profile.partials.collapses.about-information')
                                        <!-- End About Card -->

                                    </form>

                                    <!-- Skill Technical Card -->
                                    @include('profile.partials.collapses.technical-skills')
                                    <!-- End Skill Technical Card -->


                                    <!-- Skill Soft Card -->
                                    @include('profile.partials.collapses.soft-skills')
                                    <!-- End Skill Soft Card -->


                                    <!-- Start Social Media Accounts -->
                                    @include('profile.partials.collapses.social-media-accounts')
                                    <!--  End Social Media Accounts  -->
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /Col -->
                </div>
                <!-- row closed -->
            </div>
        </div>
    </x-slot>

    @push('css')
        <!---Internal Input tags css-->
        <link href="{{ asset('backend/assets/plugins/inputtags/inputtags.css')}}" rel="stylesheet">
    @endpush
</x-app-layout>
