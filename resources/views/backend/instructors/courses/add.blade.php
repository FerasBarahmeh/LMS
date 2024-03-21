<x-modal :id="'add-course'">
    <div class="card mb-0">
        <div class="card-header border-bottom">
            <span class="card-title mb-0 pb-0">New Course</span>
            <x-close-modal-header-button/>
        </div>
        <form method="POST" action="{{ route('instructor.courses.store') }}">
            @csrf
            <div class="card-body pt-0">
                <p class="tx-15 tx-gray-500 m-2">Share your new experience and knowledge for new field</p>

                <!-- Name course -->
                <div class="mb-2">
                    <x-input-label for="name" :value="__('name')"/>
                    <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')"
                                  autocomplete="name"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>

                <!-- Semester -->
                <div class="mb-2">
                    <x-input-label for="semester" :value="__('semester')"/>
                    <x-input-select name="semester">
                        @foreach(Semesters::cases() as $case)
                            <x-option-select value="{{ $case->value }}" :selected="old('semester') == $case->value">{{ $case->name }}</x-option-select>
                        @endforeach
                    </x-input-select>
                    <x-input-error :messages="$errors->get('semester')" class="mt-2"/>
                </div>

                <!-- Academic subjects -->
                <div class="mb-2">
                    <x-input-label for="academic_subject_id" :value="__('Academic subjects')"/>
                    <x-input-select name="academic_subject_id">
                        <x-option-select value="null">chose this course subject</x-option-select>
                        @foreach($academicSubjects as $subject)
                            <x-option-select value="{{ $subject->id }}" :selected="old('academic_subject_id') == $subject->id">{{ $subject->name }}</x-option-select>
                        @endforeach
                    </x-input-select>
                    <x-input-error :messages="$errors->get('academic_subject_id')" class="mt-2"/>
                </div>
            </div>

            <div class="card-footer d-flex justify-content-end">
                <x-close-modal-footer-button :content="'close'"/>
                <x-primary-button class="bg-dark ms-3 ml-1 mr-1">
                    {{ __('Add new course') }}
                </x-primary-button>
            </div>

        </form>
    </div>

</x-modal>
