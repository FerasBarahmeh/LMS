<x-auth-layout :title="__('register.register')">
    <div class="main-signup-header">
        <h2 class="text-primary text-capitalize">{{ __('register.get_started') }}</h2>
        <h5 class="font-weight-normal mb-4">
            {{__('register.free_sing_up_tacks_minute')}}
        </h5>

        <form method="POST" action="{{ route('register') }}" autocomplete="off">
            @csrf

            <!-- Full name -->
            <div class="mb-3">
                <x-input-label for="name" :value="__('common.full_name')"/>
                <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>

            <!-- Username -->
            <div class="mb-3">
                <x-input-label for="username" :value="__('common.username')"/>
                <x-text-input id="username" class="form-control" type="text" name="username" :value="old('username')" required autofocus autocomplete="username"/>
                <x-input-error :messages="$errors->get('username')" class="mt-2"/>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <x-input-label for="email" :value="__('common.email')"/>
                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="off"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <x-input-label for="password" :value="__('common.password')"/>
                <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password"/>
                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>

            <!-- Confirm password -->
            <div class="mb-3">
                <x-input-label for="password_confirmation" :value="__('register.confirm_password')"/>
                <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password"/>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
            </div>

            <!-- Submit -->
            <div class="mb-3">
                <x-primary-button class="ms-4 btn-block">
                    {{ __('register.register') }}
                </x-primary-button>
            </div>
        </form>
        <div class="main-signup-footer mt-5">
            <p>{{ __('register.already_have_account') }} <a href="{{ route('login') }}">{{ __('register.sign_in') }}</a></p>
        </div>
    </div>
</x-auth-layout>
