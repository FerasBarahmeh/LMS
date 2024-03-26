<x-auth-layout :title="__('login.login')">
    <x-slot name="head">
        <h2 class="title-head">
            <span class="tx-teal d-block mb-1"> {{ __('login.welcome_back')  }}</span>
            Login to your
            <span>Account</span>
        </h2>
        <p class="d-flex gap-5">
            <span>{{ __('login.dont_have_account') }}</span>
            <a href="{{ route('register') }}" class="ml-auto">
                <span class="text-capitalize">{{ __('login.create_account') }}</span>
            </a>
        </p>
    </x-slot>

    <form method="POST" action="{{ route('login') }}" class="contact-bx">
        @csrf
        <div class="row placeani">
            <!-- Email Address / Username -->
            <div class="col-lg-12">
                <div class="form-group">
                    <div class="input-group">
                        <x-input-label for="user_identifier" :value="__('login.email_or_username')"/>
                        <x-text-input id="user_identifier" class="form-control" type="text"
                                      name="user_identifier" :value="old('user_identifier')" autofocus
                                      autocomplete="user_identifier"/>
                        <x-input-error :messages="$errors->get('username')" class="mt-2"/>
                        <x-input-error :messages="$errors->get('email')" class="mt-1"/>
                    </div>
                </div>
            </div>

            <!-- Password -->
            <div class="col-lg-12">
                <div class="form-group">
                    <div class="input-group">
                        <x-input-label for="password" :value="__('common.password')"/>
                        <x-text-input id="password" class="form-control" type="password" name="password"
                                      autocomplete="current-password"/>
                        <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="form-group form-forget">
                    <!-- Remember me -->
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                        <label class="custom-control-label" for="customControlAutosizing">
                            Remember me
                        </label>
                    </div>
                    <!-- Forget password -->
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="ml-auto">
                            {{ __('login.forget_password') }}
                        </a>
                    @endif
                </div>
            </div>

            <!-- Submit -->
            <div class="col-lg-12 m-b30">
                <x-primary-button class="ms-3 w-100">{{ __('login.login') }}</x-primary-button>
            </div>
        </div>
    </form>
</x-auth-layout>
