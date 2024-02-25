<x-card-simple-collapse :id="'collapseAbout'" :title="'About'">

    <x-slot name="icon">
        <i class="fa fa-info"></i>
    </x-slot>

    <p class="tx-15">Unveil your story: share with us in the about section</p>

    <div class="mb-3">
        <x-input-label for="about" class="form-label" :value="__('about')"/>
        <x-textarea-input id="about" name="about" type="text" class="form-control" autocomplete="about">{{ old('about', $user->about) }}</x-textarea-input>
        <x-input-error class="mt-2" :messages="$errors->get('about')"/>
    </div>

    <div class="mt-2 d-flex justify-content-end">
        <x-primary-button :content="'Update Information'"/>
    </div>
</x-card-simple-collapse>
