<x-card-simple-collapse :id="'collapseAbout'" :title="'About'">

    <x-slot name="icon">
        <i class="fa fa-info"></i>
    </x-slot>

    <div class="form-group ">
        <p class="tx-12 tx-gray-500 p-2">Unveil your story: share with us in the about section</p>
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
