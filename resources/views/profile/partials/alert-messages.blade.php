<div class="container">
    <x-alerts.alert :success="session('profile-update-successfully')"
                    :fail="session('profile-update-fail')"/>
    <x-alerts.alert :success="session('password-updated-successfully')"/>
    <x-alerts.alert :success="session('status')"/>
    <x-alerts.alert :success="session('success-update-media')"/>
    <x-alerts.alert :success="session('success-add-experience')"/>
    <x-alerts.alert :success="session('success-edit-experience')"/>
    <x-alerts.alert :success="session('success-delete-experience')"/>
</div>
