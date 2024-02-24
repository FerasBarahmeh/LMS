<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-between w-100">
                <div class="">
                    <div class="mb-2 main-content-label">Experience</div>
                    <p class="tx-14 tx-gray-500 mb-2">Journey of Expertise: Illuminate Your Professional Path in the
                        Experience Section</p>
                </div>

                <div class="">
                    <x-modals.buttons.horizontal :dataEffect="'add-experience'" class="flex">
                        <i class="fa fa-plus"></i>
                    </x-modals.buttons.horizontal>
                    @include('profile.partials.experience.add')
                </div>
            </div>

        </div>
    </div>

    <div class="card-body">
        @each('profile.partials.experience.experiences', user()->experiences, 'experience')
    </div>

</div>

