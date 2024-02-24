<x-modal :id="'edit-experience-'.$experience->id">
    <div class="card p-2 mb-0">
        <div class="card-header">
            <span class="card-title mb-0 pb-0">Edit  ({{ $experience->job_title }}) Experience</span>
            <x-close-modal-header-button />
        </div>

        <div class="card-body bg-transparent">
            <form method="POST" action="{{ route('user.edit.experience', $experience->id) }}">
                @csrf @method('put')
                <div class="form-group">
                    <!-- Name -->
                    <x-input-label for="job_title"
                                   :value="__('job title')"/>
                    <x-text-input id="job_title" class="form-control" type="text"
                                  name="job_title"
                                  :value="old('job_title', $experience->job_title)"
                                  autofocus autocomplete="name"/>
                    <x-input-error :messages="$errors->get('job_title')" class="mt-2"/>
                </div>
                <div class="form-group">
                    <div class="mt-2">
                        <!-- Domain -->
                        <x-input-label for="company_name" :value="__('company name')"/>

                        <x-text-input id="company_name" class="form-control"
                                      type="text"
                                      :value="old('company_name', $experience->company_name)"
                                      name="company_name"
                                      autocomplete="company_name"/>

                        <x-input-error :messages="$errors->get('company_name')"
                                       class="mt-2"/>
                    </div>
                </div>

                <!-- Joined date -->
                <div class="form-group">
                    <div class="mt-2">
                        <x-input-label for="joined_date" :value="__('joined date')"/>
                       <x-input-date :name="'joined_date'" :value="parseDate(old('joined_date', $experience->joined_date))"/>
                        <x-input-error :messages="$errors->get('joined_date')"
                                       class="mt-2"/>
                    </div>
                </div>

                <!-- Leave date -->
                <div class="form-group">
                    <div class="mt-2">
                        <x-input-label for="leave_date" :value="__('leave date')"/>
                       <x-input-date :name="'leave_date'" :value="parseDate(old('leave_date', $experience->leave_date))"/>
                        <x-input-error :messages="$errors->get('leave_date')"
                                       class="mt-2"/>
                    </div>
                </div>

                <!-- Leave date -->
                <div class="form-group">
                    <div class="mt-2">
                        <x-input-label for="job_description" :value="__('job description')"/>
                        <x-textarea-input id="job_description" name="job_description"
                                          type="text" class="form-control"
                                          autocomplete="job_description">{{ old('job_description', $experience->job_description) }}</x-textarea-input>

                        <x-input-error :messages="$errors->get('job_description')"
                                       class="mt-2"/>
                    </div>
                </div>

                <div class="card-footer pt-1 p-2  d-flex justify-content-end">
                    <x-close-modal-footer-button :content="'close'"/>
                    <x-primary-button class="bg-dark ms-3 ml-1 mr-1">
                        {{ __('Add new experience') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

    </div>

</x-modal>
