<x-auth-layout :title="__('password.forget_password')">

    <div class="d-flex align-items-center flex-column py-2 m-auto w-50">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('password.forget_password_for_relax_user') }}
        </div>

        <!-- Demo content-->
        <div class="container p-0">

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('common.email')" />
                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('password.email_password_reset_link') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-auth-layout>
