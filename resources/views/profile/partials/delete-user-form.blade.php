<section class="mt-3 card">
    <header class="card-header">
        <h2 class="text-lg font-medium text-danger text-gray-900 dark:text-gray-100">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <div class="card-body">
        <x-modal-button :type="'danger'" :dataTarget="'confirm-user-deletion'">
            {{ __('Delete Account') }}
        </x-modal-button>
    </div>
    <x-modal :id="'confirm-user-deletion'">
        <div class="modal-dialog m-0" role="document">
            <div class="modal-content modal-content-demo border-0">
                <div class="modal-header">
                    <h6 class="modal-title">Delete Account</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('profile.destroy') }}">
                        @csrf @method('delete')

                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Are you sure you want to delete your account?') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                        </p>

                        <div class="mt-6">
                            <x-input-label for="password" value="{{ __('Password') }}" class="sr-only"/>

                            <x-text-input
                                id="password"
                                name="password"
                                type="password"
                                class="mt-2 mb-2"
                                placeholder="{{ __('Password') }}"
                            />
                            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2"/>
                        </div>

                        <div class="modal-footer">
                            <x-close-modal-footer-button> {{ __('Cancel') }}  </x-close-modal-footer-button>
                            <x-danger-button class="ms-3">
                                {{ __('Delete Account') }}
                            </x-danger-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-modal>


</section>
