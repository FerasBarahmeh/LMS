<x-alerts.sweets.default-popup
    :successTitle="'Created course successfully'"
    :successFail="'Created course Fail'"
    :success="session('create-course-success')"
    :fail="session('create-course-fail')"
/>
<x-alerts.alert :success="session('create-section-success')"/>
