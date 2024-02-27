<x-app-layout :title="'Dashboard'">
    <x-slot name="content">
        <div class="container">
            <x-alerts.alert :success="session('profile-update-successfully')" :fail="session('profile-update-fail')"/>
            <x-alerts.alert :success="session('password-updated-successfully')" />
            <x-alerts.alert :success="session('status')" />
        </div>
        <div class="row row-sm">
            @include('profile.partials.left-aside')
            <div class="col-lg-8">
                <div class="row row-sm">
                    <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
                        <div class="card ">
                            <div class="card-body">
                                <div class="counter-status d-flex md-mb-0">
                                    <div class="counter-icon bg-primary-transparent">
                                        <i class="icon-layers text-primary"></i>
                                    </div>
                                    <div class="ml-auto">
                                        <h5 class="tx-13">Orders</h5>
                                        <h2 class="mb-0 tx-22 mb-1 mt-1">1,587</h2>
                                        <p class="text-muted mb-0 tx-11"><i
                                                class="si si-arrow-up-circle text-success mr-1"></i>increase</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
                        <div class="card ">
                            <div class="card-body">
                                <div class="counter-status d-flex md-mb-0">
                                    <div class="counter-icon bg-danger-transparent">
                                        <i class="icon-paypal text-danger"></i>
                                    </div>
                                    <div class="ml-auto">
                                        <h5 class="tx-13">Revenue</h5>
                                        <h2 class="mb-0 tx-22 mb-1 mt-1">46,782</h2>
                                        <p class="text-muted mb-0 tx-11"><i
                                                class="si si-arrow-up-circle text-success mr-1"></i>increase</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-4 col-lg-12 col-md-12">
                        <div class="card ">
                            <div class="card-body">
                                <div class="counter-status d-flex md-mb-0">
                                    <div class="counter-icon bg-success-transparent">
                                        <i class="icon-rocket text-success"></i>
                                    </div>
                                    <div class="ml-auto">
                                        <h5 class="tx-13">Product sold</h5>
                                        <h2 class="mb-0 tx-22 mb-1 mt-1">1,890</h2>
                                        <p class="text-muted mb-0 tx-11"><i
                                                class="si si-arrow-up-circle text-success mr-1"></i>increase</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="tabs-menu ">


                            <!-- Tabs -->
                            <ul class="nav nav-tabs profile navtab-custom panel-tabs">
                                <li class="active">
                                    <a href="#home" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i
                                                class="las la-user-circle tx-16 mr-1"></i></span> <span
                                            class="hidden-xs">ABOUT ME</span> </a>
                                </li>
                                <li class="">
                                    <a href="#profile" data-toggle="tab" aria-expanded="false"> <span
                                            class="visible-xs"><i class="las la-images tx-15 mr-1"></i></span> <span
                                            class="hidden-xs">GALLERY</span> </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content border-left border-bottom border-right border-top-0 p-4">
                            @include('profile.partials.profile-tab-pane')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
