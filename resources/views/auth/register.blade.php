<x-guest-layout :title="'Register'">
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{asset('guest/img/media/login.png')}}"
                             class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
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
                                    <div class="mb-5 d-flex align-items-center justify-content-center w-full">
                                        <a href="#" >
                                            <img src="{{asset('guest/img/brand/logo-lms.png')}}"
                                                 class="sign-favicon ht-40" alt="logo">
                                        </a>
                                    </div>
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
                                                              name="username" :value="old('username')" required autofocus
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
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
</x-guest-layout>
