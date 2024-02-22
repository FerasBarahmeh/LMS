@props(['platform'])
<x-modal :id="'edit-'.$platform->id">
    <div class="card card-dark  ">
        <div class="card-header pb-0">
            <span class="card-title mb-0 pb-0">Edit <strong class="text-success">{{ $platform->name }}</strong> platform</span>
        </div>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('platforms.update', $platform->id) }}">
            @csrf @method('put')
            <div class="form-group">
                <!-- Name -->
                <x-input-label for="user_identifier"
                               :value="__('name')"/>
                <x-text-input id="name" class="form-control" type="text"
                              name="name"
                              :value="old('name', $platform->name)"
                              autofocus autocomplete="name"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>
            <div class="form-group">
                <div class="mt-4">
                    <!-- Domain -->
                    <x-input-label for="domain" :value="__('domain')"/>

                    <x-text-input id="domain" class="form-control"
                                  type="text"
                                  :value="old('domain', $platform->domain)"
                                  name="domain"
                                  autocomplete="domain"/>

                    <x-input-error :messages="$errors->get('domain')"
                                   class="mt-2"/>
                </div>
            </div>
            <div class="form-group">
                <div class="mt-4">
                    <!-- Domain -->
                    <x-input-label for="TLD" :value="__('TLD')"/>

                    <x-text-input id="TLD" class="form-control"
                                  type="text"
                                  :value="old('TLD', $platform->TLD)"
                                  name="TLD"
                                  autocomplete="TLD"/>

                    <x-input-error :messages="$errors->get('TLD')"
                                   class="mt-2"/>
                </div>
            </div>

            <div class="card-footer pt-1 p-3  d-flex justify-content-end">
                <x-close-modal-footer-button :content="'close'"/>
                <x-primary-button class="bg-dark ms-3 ml-1 mr-1">
                    {{ __('Update platform') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-modal>
