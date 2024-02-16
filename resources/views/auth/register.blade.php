<x-auth-layout :title="'Register'">
    <div class="main-signup-header">
        <h2 class="text-primary">Get Started</h2>
        <h5 class="font-weight-normal mb-4">
            It's free to signup and only takes a minute.
        </h5>

        <form method="POST" action="{{ route('register') }}" autocomplete="off">
            @csrf
            <div class="form-group">
                <x-input-label for="name" :value="__('Full Name')"/>
                <x-text-input id="name" class="form-control" type="text"
                              name="name" :value="old('name')" required autofocus
                              autocomplete="name"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>

            <div class="form-group">
                <x-input-label for="username" :value="__('Username')"/>
                <x-text-input id="username" class="form-control" type="text"
                              name="username" :value="old('username')" required
                              autofocus
                              autocomplete="username"/>
                <x-input-error :messages="$errors->get('username')" class="mt-2"/>
            </div>

            <div class="form-group">
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')"/>
                    <x-text-input id="email" class="form-control" type="email"
                                  name="email" :value="old('email')" required
                                  autocomplete="off"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>
            </div>
            <div class="form-group">
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')"/>

                    <x-text-input id="password" class="form-control"
                                  type="password"
                                  name="password"
                                  required autocomplete="new-password"/>

                    <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                </div>
            </div>
            <div class="form-group">
                <x-input-label for="password_confirmation"
                               :value="__('Confirm Password')"/>

                <x-text-input id="password_confirmation" class="form-control"
                              type="password"
                              name="password_confirmation" required
                              autocomplete="new-password"/>

                <x-input-error :messages="$errors->get('password_confirmation')"
                               class="mt-2"/>

            </div>

            <div class="form-group">
                <x-primary-button class="ms-4 btn-block">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
        <div class="main-signup-footer mt-5">
            <p>Already have an account? <a href="{{ route('login') }}">Sign
                    In</a></p>
        </div>
    </div>
</x-auth-layout>
