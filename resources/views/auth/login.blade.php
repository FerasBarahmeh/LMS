
<x-auth-layout :title="__('login.login')">
    <div class="card-sigin">
        <div class="main-signup-header">
            <h2>{{ __('login.welcome_back') }}</h2>
            <h5 class="font-weight-semibold mb-4">{{ __('login.please_sign_in to_continue') }}</h5>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address / Username -->
                <div class="mb-3">
                    <x-input-label for="user_identifier" :value="__('login.email_or_username')"/>
                    <x-text-input id="user_identifier" class="form-control" type="text" name="user_identifier" :value="old('user_identifier')" autofocus autocomplete="user_identifier"/>
                    <x-input-error :messages="$errors->get('username')" class="mt-2"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-1"/>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <x-input-label for="password" :value="__('common.password')"/>
                    <x-text-input id="password" class="form-control" type="password" name="password" autocomplete="current-password"/>
                    <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-3 w-100">{{ __('login.login') }}</x-primary-button>
                </div>
            </form>

            <div class="main-signin-footer mt-5">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('login.forget_password') }}
                    </a>
                @endif
                <p><span>{{ __('login.dont_have_account') }}</span> <a href="{{ route('register') }}"><span class="text-capitalize">{{ __('login.create_account') }}</span></a></p>
            </div>
        </div>
    </div>
</x-auth-layout>
