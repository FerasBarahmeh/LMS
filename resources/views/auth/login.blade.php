<x-guest-layout :title="'Login'">

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{ asset('guest/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex justify-content-center">
                                            <a href="#" >
                                                <img src="{{asset('guest/img/brand/logo-lms.png')}}"
                                                     class="sign-favicon ht-40" alt="logo">
                                            </a>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2>Welcome back!</h2>
                                            <h5 class="font-weight-semibold mb-4">Please sign in to continue.</h5>

                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <!-- Email Address / Username -->
                                                        <x-input-label for="user_identifier" :value="__('Email Or Username')" />
                                                        <x-text-input id="user_identifier" class="form-control" type="text" name="user_identifier" :value="old('user_identifier')"  autofocus autocomplete="user_identifier" />
                                                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                                                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                                                </div>
                                                <div class="form-group">
                                                    <div class="mt-4">
                                                        <!-- Password -->
                                                        <x-input-label for="password" :value="__('Password')" />

                                                        <x-text-input id="password" class="form-control"
                                                                      type="password"
                                                                      name="password"
                                                                       autocomplete="current-password" />

                                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                    </div>
                                                </div>
                                                <div class="flex items-center justify-end mt-4">
                                                    <x-primary-button class="ms-3">
                                                        {{ __('Log in') }}
                                                    </x-primary-button>
                                                </div>
                                            </form>

                                            <div class="main-signin-footer mt-5">
                                                @if (Route::has('password.request'))
                                                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                                        {{ __('Forgot your password?') }}
                                                    </a>
                                                @endif
                                                <p>Don't have an account? <a href="{{ route('register') }}">Create an Account</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
