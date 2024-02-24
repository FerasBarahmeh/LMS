<x-card-simple-collapse :id="'collapseName'" :title="'Name'">

    <x-slot name="icon">
        <i class="fa fa-signature"></i>
    </x-slot>

    <div class="form-group">
        <p class="tx-12 tx-gray-500 p-2">Crafting Your Identity: Elevate Your Profile with Updated Name Information</p>
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
