<div class="container">
    <x-alerts.alert :success="session('profile-update-successfully')"
                    :fail="session('profile-update-fail')"/>
    <x-alerts.alert :success="session('password-updated-successfully')"/>
    <x-alerts.alert :success="session('status')"/>
    <x-alerts.alert :success="session('success-update-media')"/>
</div>
