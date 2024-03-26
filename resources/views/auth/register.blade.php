<x-auth-layout :title="__('register.register')">

    <x-slot name="head">
        <h2 class="title-head text-capitalize">{{ __('register.get_started') }}</h2>
        <p>Login Your Account <a href="{{ route('login') }}">Click here</a></p>
    </x-slot>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{__('register.free_sing_up_tacks_minute')}}
    </div>

    <form  method="POST" action="{{ route('register') }}" autocomplete="off" class="contact-bx">
        @csrf
        <div class="row placeani">
            <!-- Full name -->
            <div class="col-lg-12">
                <div class="form-group">
                    <div class="input-group">
                        <x-input-label for="name" :value="__('common.full_name')"/>
                        <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>
                </div>
            </div>

            <!-- Username -->
            <div class="col-lg-12">
                <div class="form-group">
                    <div class="input-group">
                        <x-input-label for="username" :value="__('common.username')"/>
                        <x-text-input id="username" class="form-control" type="text" name="username" :value="old('username')" required autofocus autocomplete="username"/>
                        <x-input-error :messages="$errors->get('username')" class="mt-2"/>
                    </div>
                </div>
            </div>

            <!-- Email -->
            <div class="col-lg-12">
                <div class="form-group">
                    <div class="input-group">
                            <x-input-label for="email" :value="__('common.email')"/>
                            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="off"/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                    </div>
                </div>
            </div>

            <!-- Password -->
            <div class="col-lg-12">
                <div class="form-group">
                    <div class="input-group">
                        <x-input-label for="password" :value="__('common.password')"/>
                        <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password"/>
                        <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                    </div>
                </div>
            </div>

            <!-- Confirm password -->
            <div class="col-lg-12">
                <div class="form-group">
                    <div class="input-group">
                        <x-input-label for="password_confirmation" :value="__('register.confirm_password')"/>
                        <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password"/>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 m-b30">
                <!-- Submit -->
                <x-primary-button>
                    {{ __('register.register') }}
                </x-primary-button>
            </div>
        </div>
    </form>

    <p>{{ __('register.already_have_account') }} <a href="{{ route('login') }}">{{ __('register.sign_in') }}</a></p>
</x-auth-layout>
