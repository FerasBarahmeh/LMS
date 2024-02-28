<x-alerts.sweets.default-popup
    :successTitle="'Migrate Successfully'"
    :failTitle="'Opp\'s Successfully'"
    :success="session('migrate-student-success')"
    :fail="session('migrate-student-field')"
/>
<x-alerts.sweets.default-popup
    :title="'Changed Successfully'"
    :success="session('change-status-success')"
    :fail="session('change-status-fail')"
/>
