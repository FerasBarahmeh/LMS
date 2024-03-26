<x-auth-layout :title="__('password.forget_password')">

    <x-slot name="head">
        <h2 class="title-head">Forget <span>Password</span></h2>
        <p>Login Your Account <a href="{{ route('login') }}">Click here</a></p>
    </x-slot>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-info" :status="session('status')"/>

    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('password.forget_password_for_relax_user') }}
    </div>

    <form method="POST" action="{{ route('password.email') }}" class="contact-bx">
        @csrf
        <div class="row placeani">
            <div class="col-lg-12">
                <!-- Email -->
                <div class="form-group">
                    <div class="input-group">
                        <x-input-label for="email" :value="__('common.email')"/>
                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')"
                                      required autofocus/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 m-b30">
                <!-- Submit -->
                <x-primary-button>
                    {{ __('password.email_password_reset_link') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-auth-layout>
