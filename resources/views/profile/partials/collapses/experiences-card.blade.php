<section class="mt-3 card">
    <header class="card-header d-flex justify-content-between">
        <div class="">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Experience') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Journey of Expertise: Illuminate Your Professional Path in the
                            Experience Section.') }}
            </p>
        </div>

        <div class="">
            <x-modals.buttons.horizontal :dataEffect="'add-experience'" class="flex">
                <i class="fa fa-plus"></i>
            </x-modals.buttons.horizontal>
            @include('profile.partials.experience.add')
        </div>
    </header>

    <div class="card-body">
        @each('profile.partials.experience.experiences', user()->experiences, 'experience')
    </div>
</section>
