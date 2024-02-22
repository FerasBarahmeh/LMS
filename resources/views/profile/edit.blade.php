<x-app-layout :title="'Dashboard'">
    <x-slot name="content">
        <div class="container">
            <x-alerts.alert :success="session('profile-update-successfully')"
                            :fail="session('profile-update-fail')"/>
            <x-alerts.alert :success="session('password-updated-successfully')"/>
            <x-alerts.alert :success="session('status')"/>

        </div>
        <div class="row row-sm">
            <div class="container-fluid">
                <!-- row -->
                <div class="row row-sm">
                    <!-- Col -->
                    @include('profile.partials.left-aside')

                    <!-- Col -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-2 main-content-label">Update Your information</div>
                                <p class="tx-12 tx-gray-500 mb-2">Revitalize your data realm with the freshest, utmost precision-laden information.</p>
                                <x-alerts.errors/>
                                <div aria-multiselectable="true" class="accordion" id="accordion" role="tablist">
                                    <form action="{{ route('profile.update') }}" method="post">
                                        @csrf         @method('patch')

                                        <!-- Name Card -->
                                        <x-card-simple-collapse :id="'collapseName'" :title="'Name'" :show="true">

                                            <x-slot name="icon">
                                                <i class="fa fa-signature"></i>
                                            </x-slot>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <x-input-label for="username" class="form-label"
                                                                       :value="__('Username')"/>
                                                    </div>
                                                    <div class="col-9">
                                                        <x-text-input id="username" name="username" type="text"
                                                                      class="form-control"
                                                                      :value="old('username', $user->username)"
                                                                      required autofocus
                                                                      autocomplete="username"/>
                                                        <x-input-error class="mt-2"
                                                                       :messages="$errors->get('username')"/>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- first name --}}
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <x-input-label for="username" class="form-label"
                                                                       :value="__('First Name')"/>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <x-text-input id="first_name" name="first_name"
                                                                      type="text" class="form-control"
                                                                      :value="old('first_name', $user->first_name)"
                                                                      required
                                                                      autocomplete="first_name"/>
                                                        <x-input-error class="mt-2"
                                                                       :messages="$errors->get('first_name')"/>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- last name --}}
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <x-input-label for="last_name" class="form-label"
                                                                       :value="__('Last Name')"/>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <x-text-input id="last_name" name="last_name"
                                                                      type="text" class="form-control"
                                                                      :value="old('last_name', $user->last_name)"
                                                                      required
                                                                      autocomplete="last_name"/>
                                                        <x-input-error class="mt-2"
                                                                       :messages="$errors->get('last_name')"/>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Designation --}}
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <x-input-label for="designation" class="form-label"
                                                                       :value="__('Designation')"/>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <x-text-input id="designation" name="designation"
                                                                      type="text" class="form-control"
                                                                      :value="old('designation', $user->designation)"

                                                                      autocomplete="designation"/>
                                                        <x-input-error class="mt-2"
                                                                       :messages="$errors->get('designation')"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2 d-flex justify-content-end">
                                                <x-primary-button :content="'Update Information'"/>
                                            </div>
                                        </x-card-simple-collapse>
                                        <!-- End Name Card  -->

                                        <!-- Contact Card -->
                                        <x-card-simple-collapse :id="'collapseContact'" :title="'Contact'" >

                                            <x-slot name="icon">
                                                <i class="fa fa-address-card"></i>
                                            </x-slot>

                                            {{-- E-mail --}}
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <x-input-label for="email" class="form-label"
                                                                       :value="__('email')"/>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <x-text-input id="email" name="email"
                                                                      type="email" class="form-control"
                                                                      :value="old('email', $user->email)"
                                                                      autocomplete="email"/>
                                                        <x-input-error class="mt-2"
                                                                       :messages="$errors->get('email')"/>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- End E-mail --}}

                                            {{-- Website --}}
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <x-input-label for="website" class="form-label"
                                                                       :value="__('website')"/>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <x-text-input id="website" name="website"
                                                                      type="text" class="form-control"
                                                                      :value="old('website', $user->website)"
                                                                      autocomplete="website"/>
                                                        <x-input-error class="mt-2"
                                                                       :messages="$errors->get('website')"/>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- End Website --}}

                                            {{-- Phone --}}
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <x-input-label for="phone" class="form-label"
                                                                       :value="__('phone')"/>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <x-text-input id="phone" name="phone"
                                                                      type="text" class="form-control"
                                                                      :value="old('phone', $user->phone)"
                                                                      autocomplete="phone"/>
                                                        <x-input-error class="mt-2"
                                                                       :messages="$errors->get('phone')"/>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- End Phone --}}

                                            {{-- Address --}}
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <x-input-label for="address" class="form-label"
                                                                       :value="__('address')"/>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <x-text-input id="address" name="address"
                                                                      type="text" class="form-control"
                                                                      :value="old('address', $user->address)"
                                                                      autocomplete="address"/>
                                                        <x-input-error class="mt-2"
                                                                       :messages="$errors->get('address')"/>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- End Address --}}

                                            <div class="mt-2 d-flex justify-content-end">
                                                <x-primary-button :content="'Update Information'"/>
                                            </div>
                                        </x-card-simple-collapse>
                                        <!-- End Contact Card  -->

                                        <!-- ABOUT Card -->
                                        <x-card-simple-collapse :id="'collapseAbout'" :title="'About'">

                                            <x-slot name="icon">
                                                <i class="fa fa-info"></i>
                                            </x-slot>

                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <x-input-label for="about" class="form-label"
                                                                       :value="__('about')"/>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <x-textarea-input id="about" name="about"
                                                                          type="text" class="form-control"
                                                                          autocomplete="about">{{ old('about', $user->about) }}</x-textarea-input>
                                                        <x-input-error class="mt-2"
                                                                       :messages="$errors->get('about')"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2 d-flex justify-content-end">
                                                <x-primary-button :content="'Update Information'"/>
                                            </div>
                                        </x-card-simple-collapse>
                                        <!-- End About Card -->

                                    </form>

                                    <!-- Skill Technical Card -->
                                    <x-card-simple-collapse :id="'collapseTechnicalSkills'" :title="'Technical Skill'" class="pt-10">
                                        <x-slot name="icon">
                                            <i class="fa fa-microchip"></i>
                                        </x-slot>
                                        <livewire:add-skills-user :type="TypeSkills::Technical->value"/>
                                    </x-card-simple-collapse>
                                    <!-- End Skill Technical Card -->


                                    <!-- Skill Soft Card -->
                                    <x-card-simple-collapse :id="'collapseSoftSkills'" :title="'Soft Skill'"  class="pt-10">
                                        <x-slot name="icon">
                                            <i class="fa fa-tty"></i>
                                        </x-slot>
                                        <livewire:add-skills-user :type="TypeSkills::Soft->value"/>
                                    </x-card-simple-collapse>
                                    <!-- End Skill Soft Card -->
                                </div>
                            </div>

                        </div>
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
