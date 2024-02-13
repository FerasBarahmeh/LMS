{{--<x-guest-layout :title="'verify email'">--}}
{{--   <div class="container">--}}
{{--       <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">--}}
{{--           {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}--}}
{{--       </div>--}}

{{--       @if (session('status') == 'verification-link-sent')--}}
{{--           <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">--}}
{{--               {{ __('A new verification link has been sent to the email address you provided during registration.') }}--}}
{{--           </div>--}}
{{--       @endif--}}

{{--       <div class="mt-4 flex items-center justify-between">--}}
{{--           <form method="POST" action="{{ route('verification.send') }}">--}}
{{--               @csrf--}}

{{--               <div>--}}
{{--                   <x-primary-button>--}}
{{--                       {{ __('Resend Verification Email') }}--}}
{{--                   </x-primary-button>--}}
{{--               </div>--}}
{{--           </form>--}}

{{--           <form method="POST" action="{{ route('logout') }}">--}}
{{--               @csrf--}}

{{--               <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">--}}
{{--                   {{ __('Log Out') }}--}}
{{--               </button>--}}
{{--           </form>--}}
{{--       </div>--}}
{{--   </div>--}}
{{--</x-guest-layout>--}}
<x-guest-layout :title="'Login'">

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The content half -->
            <div class="container">
                <div class="login d-flex align-items-center py-2 justify-content-center w-100">
                    <!-- Demo content-->

                        <div class="row flex justify-content-center align-items-center">
                            <div class="card-sigin w-50">
                                <div class="mb-5 d-flex justify-content-center">
                                    <a href="#" >
                                        <img src="{{asset('guest/img/brand/logo-lms.png')}}"
                                             class="sign-favicon ht-40" alt="logo">
                                    </a>
                                </div>
                                <div class="card-sigin">
                                    <div class="container p-0">
                                        @if (session('status') == 'verification-link-sent')
                                            <x-alerts.alert :success="'A new verification link has been sent to the email address you provided during registration.'" />
                                        @endif
                                    <div class="main-signup-header">
                                        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                                            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                                        </div>

                                        <div class="mt-4" @style(['display: flex; gap: 10px; align-items: center; justify-content: center;'])>
                                            <form method="POST" action="{{ route('verification.send') }}">
                                                @csrf
                                                <div>
                                                    <x-primary-button>
                                                        {{ __('Resend Verification Email') }}
                                                    </x-primary-button>
                                                </div>
                                            </form>

                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf

                                                <x-secondary-button type="submit">
                                                    {{ __('Log Out') }}
                                                </x-secondary-button>
                                            </form>
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

