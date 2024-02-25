<x-modal :id="'add-education'">
    <div class="card mb-0">
        <div class="card-header border-bottom">
            <span class="card-title mb-0 pb-0">Add  new Education</span>
            <x-close-modal-header-button />
        </div>

        <div class="card-body bg-transparent">
            <form method="POST" action="{{ route('user.add.education') }}">
                @csrf
                <!-- Education name -->
                <div class="mb-3">
                    <x-input-label for="education_name" :value="__('Education name')"/>
                    <x-text-input id="education_name" class="form-control" type="text" name="education_name" :value="old('education_name')" autofocus autocomplete="education_name"/>
                    <x-input-error :messages="$errors->get('education_name')" class="mt-2"/>
                </div>

                <!-- Organization name -->
                <div class="mb-3">
                    <x-input-label for="organization_name" :value="__('Organization name')"/>
                    <x-text-input id="organization_name" class="form-control" type="text" :value="old('organization_name')" name="organization_name" autocomplete="organization_name"/>
                    <x-input-error :messages="$errors->get('organization_name')" class="mt-2"/>
                </div>

                <!-- start date -->
                <div class="mb-3">
                    <x-input-label for="start_date" :value="__('Start date')"/>
                    <x-input-date :name="'start_date'" :value="parseDate(old('start_date'))"/>
                    <x-input-error :messages="$errors->get('start_date')" class="mt-2"/>
                </div>

                <!-- Finish date -->
                <div class="mb-3">
                    <x-input-label for="finish_date" :value="__('finish date')"/>
                    <x-input-date :name="'finish_date'" :value="parseDate(old('finish_date', ''))"/>
                    <x-input-error :messages="$errors->get('finish_date')" class="mt-2"/>
                </div>
                <!-- description -->
                <div class="mb-3">
                    <x-input-label for="description" :value="__('description')"/>
                    <x-textarea-input id="description" name="description" type="text" class="form-control" autocomplete="description">{{ old('description') }}</x-textarea-input>
                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                </div>

                <div class="card-footer pt-1 p-2  d-flex justify-content-end">
                    <x-close-modal-footer-button :content="'close'"/>
                    <x-primary-button class="bg-dark ms-3 ml-1 mr-1">
                        {{ __('Add new education') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

    </div>

</x-modal>
