<div class="tab-pane" id="settings">
    <div class="panel panel-primary tabs-style-3">
        <div class="tab-menu-heading">
            <div class="tabs-menu ">
                <!-- Tabs -->
                <ul class="nav panel-tabs">
                    <li class="">
                        <a href="#tab11" class="active flex align-items-center justify-content-center  gap-10" data-toggle="tab">
                            <i class="fa fa-info-circle"></i>
                            <span>Main Info</span>
                        </a>
                    </li>
                    <li>
                        <a href="#tab12" data-toggle="tab">
                            <i class="fa fa-lock "></i>
                        <span>Password</span>
                        </a>
                    </li>
                    <li>
                        <a href="#tab13" data-toggle="tab">
                            <i class="fa fa-trash"></i>
                            <span> Delete Account</span>
                        </a>
                    </li>
                    <li>
                        <a href="#app-settings" data-toggle="tab">
                            <i class="fa fa-desktop"></i>
                            <span> App Settings</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="panel-body tabs-menu-body">
            <div class="tab-content">
                <div class="tab-pane active" id="tab11">
                    @include('profile.partials.update-profile-information-form')
                </div>
                <div class="tab-pane" id="tab12">
                    @include('profile.partials.update-password-form')
                </div>
                <div class="tab-pane" id="tab13">
                    @include('profile.partials.delete-user-form')
                </div>

                <div class="tab-pane" id="app-settings">
                    @include('profile.partials.app-setting')
                </div>

            </div>
        </div>
    </div>
</div>
