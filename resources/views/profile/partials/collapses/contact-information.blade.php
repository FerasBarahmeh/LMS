<x-card-simple-collapse :id="'collapseContact'" :title="'Contact'">

    <x-slot name="icon">
        <i class="fa fa-address-card"></i>
    </x-slot>

    {{-- E-mail --}}
    <div class="form-group ">
        <p class="tx-12 tx-gray-500 p-2">Seamless Connections: Enhance Your Profile by Updating Contact Information</p>
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
