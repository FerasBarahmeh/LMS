@extends('backend.instructors.courses.layouts.manage')
@section('card-title', 'select curriculum for ')
@section('card-hint', 'Here’s where you add course content—like lectures, course sections, assignments, and more.')
@section('content')
    <div class="card-header border-bottom">
        <h2 class="text-dark">Curriculum <q class="text-muted ">{{ $course->name }}</q></h2>
    </div>
    <div class="card-body">
        <div class="container">
            <p class="text-muted">Start putting together your course by creating sections, lectures and practice (exercises and assignments). Start putting together your course by creating sections, lectures and practice activities. Use your course outline to structure your content and label your sections and lectures clearly. If you’re intending to offer your course for free, the total length of video content must be less than 2 hours.</p>
        </div>

        <livewire:courses.add-section :courseID="$course->id"/>

        <div class="card p-1 mt-5">
            <section class="sections p-4">
                <h4 @class(['mb-4', 'text-dark', ])><i class="fa fa-caret-right m-1"></i>Sections for <q class="text-primary">{{ $course->name }}</q> course</h4>
                @foreach($course->sections as $section)
                    <livewire:courses.section-edition-slug :section="$section" :course="$course"/>
                    <div class="container">
{{--                        <livewire:courses.lecture :section="$section"/>--}}
                    </div>
                @endforeach
            </section>
        </div>
    </div>
@endsection
