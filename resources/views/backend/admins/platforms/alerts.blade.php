<x-alerts.sweets.default-popup
    :title="'Deleted Successfully'"
    :success="session('success-delete-platform')"
    :fail="session('field-delete-platform')"
/>
<x-alerts.sweets.default-popup
    :title="'Updated Successfully'"
    :success="session('success-update-platform')"
    :fail="session('field-update-platform')"
/>
<x-alerts.sweets.default-popup
    :title="'Updated Successfully'"
    :success="session('success-add-platform')"
    :fail="session('field-add-platform')"
/>
