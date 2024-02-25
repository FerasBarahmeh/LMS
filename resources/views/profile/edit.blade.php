<x-app-layout :title="'Dashboard'">
    <x-slot name="content">
        <!-- alert messages container -->
        @include('profile.partials.alert-messages')
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
                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                    <div class="verify-message bg-warning p-2 m-2 box-shadow-warning d-flex justify-content-center align-items-center br-bl-7 br-br-7">
                                        <p class="text-gray-800 dark:text-gray-200 m-0">
                                            {{ __('Your email address is unverified.') }}
                                        </p>
                                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                            @csrf
                                            <button form="send-verification" type="submit" class="btn p-0 text-gray-800 dark:text-gray-200">
                                                {{ __('Click here to re-send the verification email.') }}
                                            </button>
                                        </form>

                                        @if (session('status') === 'verification-link-sent')
                                            <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                                {{ __('A new verification link has been sent to your email address.') }}
                                            </p>
                                        @endif
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

                                        <!-- ABOUT Card -->
                                        @include('profile.partials.collapses.about-information')
                                        <!-- End About Card -->

                                    </form>

                                    <!-- Skill Technical Card -->
                                    @include('profile.partials.collapses.technical-skills')
                                    <!-- End Skill Technical Card -->


                                    <!-- Skill Soft Card -->
                                    @include('profile.partials.collapses.soft-skills')
                                    <!-- End Skill Soft Card -->


                                    <!-- Start Social Media Accounts -->
                                    @include('profile.partials.collapses.social-media-accounts')
                                    <!--  End Social Media Accounts  -->
                                </div>
                            </div>
                        </section>


                        <!-- Start  Education   -->
                        @include('profile.partials.education-form')
                        <!--  End Education   -->


                        <!-- Start  Experience   -->
                        @include('profile.partials.experiences-form')
                        <!--  End Experience   -->


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

    @push('css')
        <!---Internal Input tags css-->
        <link href="{{ asset('backend/assets/plugins/inputtags/inputtags.css')}}" rel="stylesheet">
    @endpush
</x-app-layout>
