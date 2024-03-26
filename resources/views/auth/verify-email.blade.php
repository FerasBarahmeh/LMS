<x-auth-layout :title="__('email.verify_email')">

    <x-slot name="head">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
    </x-slot>

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
                                        <img src="{{asset('guest/assets/images/logo-white-2.png')}}"
                                             class="sign-favicon ht-40" alt="logo">
                                    </a>
                                </div>
                                <div class="card-sigin">
                                    <div class="container p-0">
                                        @if (session('status') == 'verification-link-sent')
                                            <x-alerts.alert :success="__('email.success_verification_link_send')" />
                                        @endif
                                    <div class="main-signup-header">
                                        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                                            {{ __('email.thanks_for_sign_up') }}
                                        </div>

                                        <div class="mt-4" @style(['display: flex; gap: 10px; align-items: center; justify-content: center;'])>
                                            <form method="POST" action="{{ route('verification.send') }}">
                                                @csrf
                                                <div>
                                                    <x-primary-button>
                                                        {{ __('email.resend_verification_email') }}
                                                    </x-primary-button>
                                                </div>
                                            </form>

                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <x-secondary-button type="submit">
                                                    {{ __('common.logout') }}
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
</x-auth-layout>

