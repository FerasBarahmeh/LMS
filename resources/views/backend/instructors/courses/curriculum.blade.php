@extends('backend.instructors.courses.layouts.manage')
@section('card-title', 'select curriculum for ')
@section('card-hint', 'Here’s where you add course content—like lectures, course sections, assignments, and more.')

@section('alerts')
    @if(session()->has('create-course-success'))
        <x-alerts.sweets.default-popup
            :successTitle="'Created course successfully'"
            :successFail="'Created course Fail'"
            :success="session('create-course-success')"
            :fail="session('create-course-fail')"
        />
    @endif

    @if (session()->has('create-section-success'))
        <x-alerts.alert :success="session('create-section-success')"/>
    @endif

    @if (session()->has('delete-section-success'))
        <x-alerts.alert :success="session('delete-section-success')"/>
    @endif

    @if (session()->has('delete-lecture-success'))
        <x-alerts.sweets.default-popup
            :successTitle="'Deleted lecture successfully'"
            :success="session('delete-lecture-success')"
        />
    @endif
@endsection

@section('content')
    <div class="card-header border-bottom d-flex justify-content-between">
        <h2 class="text-dark">Curriculum <q class="text-muted ">{{ $course->name }}</q></h2>
        <x-modals.buttons.horizontal :dataEffect="'add-section'">
            <i class="si icon-plus"></i>
            <span>Add section</span>
        </x-modals.buttons.horizontal>
    </div>
    <div class="card-body">
        <div class="container">
            <p class="text-muted">
                Start putting together your course by creating sections, lectures and practice
                (exercises and assignments). Start putting together your course by creating sections, lectures and
                practice activities. Use your course outline to structure your content and label your sections and
                lectures clearly. If you’re intending to offer your course for free, the total length of video content
                must be less than 2 hours.
            </p>
        </div>

        <livewire:courses.add-section :courseID="$course->id"/>

        <div class="card p-1 mt-5">
            <section class="sections p-4">
                <h4 @class(['mb-4 text-dark', ])><i class="fa fa-caret-right m-1"></i>Sections for <q
                        class="text-primary">{{ $course->name }}</q> course</h4>
                <div class="pr-3 pl-3">
                    @foreach($course->sections as $section)
                        <livewire:courses.section-edition-slug :section="$section" :loop="$loop"/>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
@endsection

