<x-alerts.sweets.default-popup
    :successTitle="'Migrate Successfully'"
    :failTitle="'Opp\'s'"
    :success="session('migrate-student-success')"
    :fail="session('migrate-student-field')"
/>
<x-alerts.sweets.default-popup
    :successTitle="'Migrate Successfully'"
    :failTitle="'Opp\'s'"
    :success="session('migrate-instructor-success')"
    :fail="session('migrate-instructor-field')"
/>
<x-alerts.sweets.default-popup
    :title="'Changed Successfully'"
    :success="session('change-status-success')"
    :fail="session('change-status-fail')"
/>
