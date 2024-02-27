<x-card-simple-collapse :id="'collapseName'" :title="'Name'" :show="true">

    <x-slot name="icon">
        <i class="fa fa-signature"></i>
    </x-slot>
    <p class="tx-15">Crafting Your Identity: Elevate Your Profile with Name Information</p>

    <!-- username -->
    <div class="mb-3">
        <x-input-label for="username" class="form-label" :value="__('Username')"/>
        <x-text-input id="username" name="username" type="text" class="form-control"
                      :value="old('username', $user->username)" required autofocus autocomplete="username"/>
        <x-input-error class="mt-2" :messages="$errors->get('username')"/>
    </div>

    {{-- first name --}}
    <div class="mb-3">
        <x-input-label for="username" class="form-label" :value="__('First Name')"/>
        <x-text-input id="first_name" name="first_name" type="text" class="form-control"
                      :value="old('first_name', $user->first_name)" required autocomplete="first_name"/>
        <x-input-error class="mt-2" :messages="$errors->get('first_name')"/>
    </div>

    {{-- last name --}}
    <div class="mb-3">
        <x-input-label for="last_name" class="form-label" :value="__('Last Name')"/>
        <x-text-input id="last_name" name="last_name" type="text" class="form-control"
                      :value="old('last_name', $user->last_name)" required autocomplete="last_name"/>
        <x-input-error class="mt-2" :messages="$errors->get('last_name')"/>
    </div>

    <div class="mt-2 d-flex justify-content-end">
        <x-primary-button :content="'Update Information'"/>
    </div>
</x-card-simple-collapse>
