@extends('backend.instructors.courses.layouts.manage')
@section('card-title', 'Settings for ')
@section('card-hint', 'Tailor your course settings: customize course settings, notifications, security, and appearance settings.')
@section('content')
    <div class="card-header border-bottom d-flex justify-content-between">
        <h2 class="text-dark d-flex align-items-center gap-10"> <i class="icon icon-settings"></i> <span>Settings <q class="text-muted "> {{ $course->name }}</q></span></h2>
    </div>

    <section class="wrapper d-grid cards">
        <div class="card m-2 p-2">
            <div class="card-header">
                <h3 class="text-dark">Published</h3>
            </div>
            <div class="card-body">
                <p class="text-muted p-1">To publish a course, it must include at least one lecture, a distribution, price, messages, title, department, course image, and promotional video.</p>

                <!-- Alerts -->
                @if (session()->has('success-publish-course'))
                    <x-alerts.success :message="session('success-publish-course')"/>
                @elseif(session()->has('failed-publish-course'))
                    <x-alerts.danger :message="session('failed-publish-course')"/>
                @endif

                <!-- Publish form -->
                <form method="POST" action="{{ route('instructor.courses.manage.publish', $course->id) }}">
                    @csrf @method('put')
                    <x-primary-button name="id" @class(['mt-2 bg-transparent d-flex gap-5 align-items-center', 'text-danger disable' => !$course->service()->publishable() || $course->service()->isPublish(), 'text-success' => $course->service()->publishable()])>
                        <i class="icon icon-rocket"></i>
                        <span> {{ $course->service()->isPublish() ? 'Un publish' : 'Publish' }}</span>
                    </x-primary-button>
                    <x-input-error :messages="$errors->get('id')" class="mt-2"/>
                </form>
                <span class="text-muted tx-11 p-2 m-3">{{ $course->service()->publishable() ? 'you can publish it now' : 'Can\'t publish for now'  }}</span>
            </div>
        </div>
    </section>

@endsection
