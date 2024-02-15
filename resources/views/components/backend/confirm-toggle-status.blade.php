@props([
    'id',
    'status'
])

<x-modal :id="'toggle-status'.$id">
    <div class="modal-header">
        <h6 class="modal-title">Toggle Status to <span class="text-capitalize text-{{ $status === \App\Enums\Status::Active->value ? 'danger' : 'primary' }}">{{ $status == \App\Enums\Status::Active->value ? \App\Enums\Status::InActive->value : \App\Enums\Status::Active->value  }}</span></h6>
        <x-close-modal-header-button />
    </div>
    <div class="modal-body">
        <form method="post" action="{{ route('user.toggle.status', $id) }}" class="p-6">
            @csrf @method('put')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to change status for instructor ?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Modify status for the instructor, resulting in the deactivation of all courses and restricting student access to these specific courses.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
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
