<x-alerts.sweets.default-popup
    :successTitle="'Created course successfully'"
    :successFail="'Created course Fail'"
    :success="session('create-course-success')"
    :fail="session('create-course-fail')"
/>
<x-alerts.sweets.default-popup
    :successTitle="'Deleted lecture successfully'"
    :success="session('delete-lecture-success')"
/>

<x-alerts.sweets.default-popup
    :successTitle="'Success update Course'"
    :success="session('update-course-success')"
/>

<x-alerts.sweets.default-popup
    :successTitle="'Success update image Course'"
    :success="session('update-course-image-success')"
/>

<x-alerts.sweets.default-popup
    :successTitle="'Success update promotional video Course'"
    :success="session('update-course-promotional-success')"
/>

<x-alerts.alert :success="session('create-section-success')"/>
<x-alerts.alert :success="session('delete-section-success')"/>
