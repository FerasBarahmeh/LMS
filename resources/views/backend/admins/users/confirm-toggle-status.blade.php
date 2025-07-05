@props([
    'id',
    'status'
])

<x-modal :id="'toggle-status'.$id">
    <div class="modal-header">
        <h6 class="modal-title">Toggle Status to <span class="text-capitalize text-{{ $status === Status::Active->value ? 'danger' : 'primary' }}">{{ $status == Status::Active->value ? Status::InActive->value : Status::Active->value  }}</span></h6>
        <x-close-modal-header-button />
    </div>
    <div class="modal-body">
        <form method="post" action="{{ route('admin.user.toggle.status', $id) }}" class="p-6">
            @csrf @method('put')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to change status for instructor ?') }}
            </h2>

            @if($status === Status::Active->value )
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Modify status for the user, resulting in the deactivation of account in platform.') }}
            @else
                </p>                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Make the account now active and ready to use on our platform.') }}
                </p>

            @endif


            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password.confirm_password') }}" class="sr-only" />
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-2 mb-2"
                    placeholder="{{ __('Your password to confirm operation') }}"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="modal-footer">
                <x-danger-button class="ms-3">
                    {{ __('change status') }}
                </x-danger-button>
                <x-close-modal-footer-button>{{ __('close') }}</x-close-modal-footer-button>
            </div>
        </form>
    </div>

</x-modal>
