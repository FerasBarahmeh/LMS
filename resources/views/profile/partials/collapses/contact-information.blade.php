<x-card-simple-collapse :id="'collapseContact'" :title="'Contact'">

    <x-slot name="icon">
        <i class="fa fa-address-card"></i>
    </x-slot>
    <p class="tx-15">Seamless Connections: Enhance Your Profile by Updating Contact Information</p>

    {{-- E-mail --}}
    <div class="mb-3">
        <x-input-label for="email" class="form-label" :value="__('email')"/>
        <x-text-input id="email" name="email" type="email" class="form-control" :value="old('email', $user->email)" autocomplete="email"/>
        <x-input-error class="mt-2" :messages="$errors->get('email')"/>
    </div>
    {{-- End E-mail --}}

    {{-- Website --}}
    <div class="mb-3">
        <x-input-label for="website" class="form-label" :value="__('website')"/>
        <x-text-input id="website" name="website" type="text" class="form-control" :value="old('website', $user->website)" autocomplete="website"/>
        <x-input-error class="mt-2" :messages="$errors->get('website')"/>
    </div>
    {{-- End Website --}}

    {{-- Phone --}}
    <div class="mb-3">
        <x-input-label for="phone" class="form-label" :value="__('phone')"/>
        <x-text-input id="phone" name="phone" type="text" class="form-control" :value="old('phone', $user->phone)" autocomplete="phone"/>
        <x-input-error class="mt-2" :messages="$errors->get('phone')"/>
    </div>
    {{-- End Phone --}}

    {{-- Address --}}
    <div class="mb-3">
        <x-input-label for="address" class="form-label" :value="__('address')"/>
        <x-text-input id="address" name="address" type="text" class="form-control" :value="old('address', $user->address)" autocomplete="address"/>
        <x-input-error class="mt-2" :messages="$errors->get('address')"/>
    </div>
    {{-- End Address --}}

    <div class="mt-2 d-flex justify-content-end">
        <x-primary-button :content="'Update Information'"/>
    </div>
</x-card-simple-collapse>
