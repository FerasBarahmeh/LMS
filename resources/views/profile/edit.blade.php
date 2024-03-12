@php use Illuminate\Contracts\Auth\MustVerifyEmail; @endphp
<x-app-layout :title="'Dashboard'">

    <x-slot name="content">
        <!-- Start alert messages -->
        @include('profile.partials.alert-messages')
        <div class="container">
            @if (session('status') === 'verification-link-sent')
                <x-alerts.alert :success="__('email.success_verification_email_send') "/>
            @endif
        </div>
        <!-- End alert messages -->

        <div class="row row-sm">
            <div class="container-fluid">
                <!-- row -->
                <div class="row row-sm">
                    <!-- Col -->
                    @include('profile.partials.left-aside')

                    <!-- Col -->
                    <div class="col-lg-8">
                        <section class="mt-3 card">
                            <div class="m-2">
                                <x-alerts.errors/>
                            </div>
                            <header class="card-header">

                                <!-- Start verify email message -->
                                @if ($user instanceof MustVerifyEmail && ! $user->hasVerifiedEmail())
                                    <div
                                        class="verify-message bg-warning p-2 m-2 box-shadow-warning d-flex justify-content-center align-items-center br-bl-7 br-br-7">
                                        <p class="text-gray-800 dark:text-gray-200 m-0">
                                            {{ __('email.email_un_verified_email') }}
                                        </p>
                                        <form id="send-verification" method="post"
                                              action="{{ route('verification.send') }}">
                                            @csrf
                                            <button form="send-verification" type="submit"
                                                    class="btn p-0 text-gray-800 dark:text-gray-200">
                                                {{ __('email.click_to_resend_verification_email') }}
                                            </button>
                                        </form>
                                    </div>
                                @endif
                                <!-- End verify email message -->

                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Update information') }}
                                </h2>

                                <p class="mt-1">
                                    {{ __('Revitalize your data realm with the freshest, utmost precision-laden information.') }}
                                </p>
                            </header>

                            <div class="card-body">
                                <!-- Message -->
                                <x-alerts.alert :success="session('profile-update-successfully')" :fail="session('profile-update-fail')"/>

                                <div aria-multiselectable="true" class="accordion" id="accordion" role="tablist">
                                    <form action="{{ route('profile.update') }}" method="post">
                                        @csrf         @method('patch')

                                        <!-- Name Card -->
                                        @include('profile.partials.collapses.name-information')
                                        <!-- End Name Card  -->

                                        <!-- Contact Card -->
                                        @include('profile.partials.collapses.contact-information')
                                        <!-- End Contact Card  -->

                                    </form>
                                </div>
                            </div>
                        </section>

                        <!-- Start  Change Password   -->
                        @include('profile.partials.update-password-form')
                        <!--  End Change Password   -->

                        <!-- Start  delete account -->
                        @include('profile.partials.delete-user-form')
                        <!--  End delete account  -->

                    </div>
                    <!-- /Col -->
                </div>
                <!-- row closed -->
            </div>
        </div>
    </x-slot>

</x-app-layout>
