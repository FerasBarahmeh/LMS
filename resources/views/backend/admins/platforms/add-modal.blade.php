<x-modal :id="'add-platform'">
    <div class="card card-dark  ">
        <div class="card-header pb-0">
            <span class="card-title mb-0 pb-0">Add  new platform information</span>
        </div>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.platforms.store') }}">
            @csrf

            <!-- Name platform -->
            <div class="mb-3">
                <x-input-label for="name" :value="__('name')"/>
                <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')"
                              autocomplete="name"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>

            <!-- Username in platform -->
            <div class="mb-3">
                <x-input-label for="username" :value="__('username')"/>
                <x-text-input id="username" class="form-control" type="text" :value="old('username')" name="username"
                              autocomplete="username"/>
                <x-input-error :messages="$errors->get('username')" class="mt-2"/>
            </div>

            <!-- Link -->
            <div class="mb-3">
                <x-input-label for="link" :value="__('link')"/>
                <x-text-input id="link" class="form-control" type="text" :value="old('link')" name="link"
                              autocomplete="link"/>
                <x-input-error :messages="$errors->get('link')" class="mt-2"/>
            </div>

            <!-- Icon -->
            <x-input-select name="icon_id">
                <x-option-select :value="null">the icons available for platforms</x-option-select>
                @foreach($icons as $icon)
                    <x-option-select :value="$icon->id" :selected="old('icon_id') == $icon->id">
                        {{ $icon->name }}
                    </x-option-select>
                @endforeach
            </x-input-select>

            <div class="card-footer pt-1 p-3  d-flex justify-content-end">
                <x-close-modal-footer-button :content="'close'"/>
                <x-primary-button class="bg-dark ms-3 ml-1 mr-1">
                    {{ __('Add new platform') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-modal>
