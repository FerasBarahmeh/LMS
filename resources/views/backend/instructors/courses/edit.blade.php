
@extends('backend.instructors.courses.layouts.manage')
@section('card-title', 'select curriculum for ')
@section('card-hint', 'Here’s where you add course content—like lectures, course sections, assignments, and more.')
@section('content')
    <div class="card-header border-bottom d-flex justify-content-between">
        <h2 class="text-dark">Landing page <q class="text-muted ">{{ $course->name }}</q></h2>
    </div>
    <div class="card-body">
        <p class="text-muted">
            Your course landing page is crucial to your success on LMS. If it’s done right, it can also help you
            gain visibility in search engines like Google. As you complete this section, think about creating a
            compelling Course Landing Page that demonstrates why someone would want to enroll in your course. Learn
            more about creating your course landing page and course title standards.
        </p>

        <!-- Main information -->
        <div class="mt-3">
            <form method="post" action="{{ route('instructor.courses.update', $course->id) }}">
                @csrf @method('put')
                <!-- Course name -->
                <div class="mt-3">
                    <x-input-label for="name" value="{{ __('name') }}" class="mt-3 mb-1"/>
                    <x-text-input name="name" value="{{ $course->name }}"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>

                <!-- Description -->
                <div class="mt-3">
                    <x-input-label for="description" value="{{ __('description') }}" class="mt-3 mb-1"/>
                    <x-simple-editor name="description">{!! $course->description !!}</x-simple-editor>
                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                </div>

                <!-- Semester -->
                <div class="mt-3">
                    <x-input-label for="semester" value="{{ __('semester') }}" class="mt-3 mb-1"/>
                    <x-input-select name="semester">
                        <x-option-select
                            value="{{ Semesters::First->value }}"
                            :selected="Semesters::isFirst($course->semester)">
                            {{ Semesters::name(Semesters::First->value) }}
                        </x-option-select>
                        <x-option-select
                            value="{{ Semesters::Second->value }}"
                            :selected="Semesters::isSecond($course->semester)">
                            {{ Semesters::name( Semesters::Second->value) }}
                        </x-option-select>
                        <x-option-select
                            value="{{ Semesters::Complement->value }}"
                            :selected="Semesters::isComplement($course->semester)">
                            {{ Semesters::name( Semesters::Complement->value) }}
                        </x-option-select>
                    </x-input-select>
                    <x-input-error :messages="$errors->get('semester')" class="mt-2"/>
                </div>

                <!-- Academic Subject -->
                <div class="mt-3">
                    <x-input-label
                        for="academic_subject_id"
                        value="{{ __('Academic Subject') }}"
                        class="mt-3 mb-1"
                    />
                    <x-input-select name="academic_subject_id">
                        @foreach($subjects as $subject)
                            <x-option-select
                                value="{{ $subject->id }}"
                                :selected="$course->academic_subject_id == $subject->id || old('academic_subject_id')"
                            >
                                {{ $subject->name }}
                            </x-option-select>
                        @endforeach
                    </x-input-select>
                    <x-input-error :messages="$errors->get('academic_subject_id')" class="mt-2"/>
                </div>

                <x-primary-button class="mt-4">Save</x-primary-button>
            </form>
        </div>

        <!-- Change image -->
        <div class="mt-3">
            <h5 class="pr-5 pl-5 mb-3 text-dark">Course image</h5>
            <div class="flex-wrap d-flex align-items-center-center gap-10 pl-5 pr-5">
                <figure class="flex-1 wd-300 ht-300 m-0">
                    <img
                        src="{{ $course->service()->courseImage() }}"
                        alt='image course' class=" shadow-1 w-100 h-100"/>
                </figure>
                <div class="flex-1 align-self-center">
                    <p class="text-dark text-break">Upload your course image here. It must meet our course image quality
                        standards to be accepted. Important guidelines: 750x422 pixels; .jpg, .jpeg,. gif, or .png. no
                        text on the image.</p>
                    <form method="POST" action="{{ route('instructor.courses.manage.image', $course->id) }}"
                          enctype="multipart/form-data">
                        @csrf @method('patch')
                        <div class="mb-3">
                            <x-input-file name="course_image"/>
                            <x-input-error :messages="$errors->get('course_image')" class="mt-2"/>
                        </div>
                        <x-primary-button class="mt-2">Change image</x-primary-button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
