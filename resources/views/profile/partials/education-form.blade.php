<section class="mt-3 card">
    <!-- messages -->
    <x-alerts.alert :success="session('success-add-education')"/>
    <x-alerts.alert :success="session('success-edit-education')"/>
    <x-alerts.alert :success="session('success-delete-education')"/>
    <!-- End Messages -->

    <header class="card-header d-flex justify-content-between">
        <div class="">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Education') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Educational Odyssey: Document Your Academic Journey in the Education Section.') }}
            </p>
        </div>

        <div class="">
            <x-modals.buttons.horizontal :dataEffect="'add-education'" class="flex">
                <i class="fa fa-plus"></i>
            </x-modals.buttons.horizontal>
            @include('profile.partials.education.add')
        </div>
    </header>

    <div class="card-body">
        @each('profile.partials.education.educations', $user->educations, 'education')
    </div>
</section>
