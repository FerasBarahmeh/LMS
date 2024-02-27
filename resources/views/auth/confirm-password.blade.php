<x-auth-layout :title="__('password.confirm_password')">
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('password.hint_confirm_password') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('common.password')" />

            <x-text-input id="password" class="form-control"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('common.confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-auth-layout>
