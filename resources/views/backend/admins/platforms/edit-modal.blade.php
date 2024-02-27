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

            <!-- Name -->
            <x-input-label for="user_identifier" :value="__('name')"/>
            <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name', $platform->name)"
                          autofocus autocomplete="name"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2"/>

            <!-- Username -->
            <div class="mb-3">
                <x-input-label for="username" :value="__('username')"/>
                <x-text-input id="username" class="form-control" type="text"
                              :value="old('username', $platform->username)" name="username" autocomplete="username"/>
                <x-input-error :messages="$errors->get('username')" class="mt-2"/>
            </div>

            <!-- Link -->
            <div class="mb-3">
                <x-input-label for="link" :value="__('link')"/>
                <x-text-input id="link" class="form-control" type="text" :value="old('link', $platform->link)"
                              name="link"
                              autocomplete="link"/>
                <x-input-error :messages="$errors->get('link')" class="mt-2"/>
            </div>

            <!-- Submit -->
            <div class="card-footer pt-1 p-3  d-flex justify-content-end">
                <x-close-modal-footer-button :content="'close'"/>
                <x-primary-button class="bg-dark ms-3 ml-1 mr-1">
                    {{ __('Update platform') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-modal>
