<x-modal :id="'downgrade-'.$id">
    <!-- Modal head -->
    <div class="modal-header">
        <h6 class="modal-title">
            Migrate <q class="text-capitalize text-primary">{{ $user->username }}</q> to user
        </h6>
        <x-close-modal-header-button/>
    </div>

    <!-- Modal Body -->
    <div class="modal-body">
        <form method="post" action="{{ route('admin.migrate.instructor.to.student', $id) }}" class="p-6">
            @csrf @method('put')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to migrate :username to student ?', [$user->username]) }}
            </h2>

            <p>{{ __('Adjusting the user\'s privileges involves modifying their capabilities within the system. This may include reducing certain permissions, such as limiting the ability to add new courses or perform certain tasks. By adjusting the user\'s privileges downward, we aim to ensure that they have an appropriate level of access and authority for their responsibilities. This process is designed to restrict the user\'s powers, optimizing their functionality within the specified environment.') }}</p>

            <!-- Password -->
            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="mt-3 mb-0 text-primary"/>
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-2 mb-2"
                    placeholder="{{ __('Your password to confirm operation') }}"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <x-primary-button :content=" __('migrate')" class="ms-3 text-capitalize"/>
                <x-close-modal-footer-button>{{ __('close') }}</x-close-modal-footer-button>
            </div>

        </form>
    </div>
</x-modal>
