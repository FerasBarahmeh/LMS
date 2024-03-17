@extends('backend.instructors.courses.layouts.manage')
@section('card-title', 'select curriculum for ')
@section('card-hint', 'Here’s where you add course content—like lectures, course sections, assignments, and more.')
@section('content')
    <div class="card-header border-bottom d-flex justify-content-between">
        <h2 class="text-dark">Landing page <q class="text-muted ">{{ $course->name }}</q></h2>
    </div>
    <div class="card-body">
        <div class="container">
            <p class="text-muted">
                Your course landing page is crucial to your success on LMS. If it’s done right, it can also help you
                gain visibility in search engines like Google. As you complete this section, think about creating a
                compelling Course Landing Page that demonstrates why someone would want to enroll in your course. Learn
                more about creating your course landing page and course title standards.
            </p>

            <div class="mt-3">
                <form method="post" >
                    <!-- Course name -->
                    <div class="mt-3">
                        <x-input-label for="name" value="{{ __('name') }}" class="mt-3 mb-1"/>
                        <x-text-input name="name" value="{{ $course->name }}"/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>

                    <!-- Description -->
                    <div class="mt-3">
                        <x-input-label for="description" value="{{ __('description') }}" class="mt-3 mb-1"/>

                        <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
