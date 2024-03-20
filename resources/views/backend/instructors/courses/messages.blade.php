@extends('backend.instructors.courses.layouts.manage')
@section('card-title', 'Messages for ')
@section('card-hint', 'Here’s where you add course content—like lectures, course sections, assignments, and more.')
@section('content')
    <div class="card-header border-bottom d-flex justify-content-between">
        <h2 class="text-dark">Messages <q class="text-muted ">{{ $course->name }}</q></h2>
    </div>

    <div class="card-body">
        <div class="container">
            <p class="text-muted">
                Write messages to your students that will be sent automatically when they join or complete your course
                to encourage students to engage with course content. <span class="text-info">This one requirement to publish course.</span>
            </p>
        </div>

        <div class="card p-3 mt-5">
            <!-- Alerts -->
            @if (session()->has('success-update-welcome-message'))
                <x-alerts.success :message="session('success-update-welcome-message')"/>
            @elseif(session()->has('success-update-congratulations-message'))
                <x-alerts.danger :message="session('success-update-congratulations-message')"/>
            @endif

            <form method="POST" action="{{ route('instructor.courses.manage.updateMessages', $course->id) }}">
                @csrf @method('PUT')
                <!-- Welcome message -->
                <div class="message mt-3">
                    <h6 class="text-dark tx-15 bold-text">Welcome message</h6>
                    <div class="mt-3">
                        <x-simple-editor name="welcome_message" id="welcome-message"
                                         :height="150">{!! $course->welcome_message !!}</x-simple-editor>
                        <x-input-error :messages="$errors->get('welcome_message')" class="mt-2"/>
                    </div>
                </div>
                <!-- Congratulation message -->
                <div class="message mt-3">
                    <h6 class="text-dark tx-15">Congratulation message</h6>
                    <div class="mt-3">
                        <x-simple-editor name="congratulations_message" id="congratulation-message"
                                         :height="150">{!! $course->congratulations_message !!}</x-simple-editor>
                        <x-input-error :messages="$errors->get('congratulations_message')" class="mt-2"/>
                    </div>
                </div>

                <!-- Submit -->
                <x-primary-button class="mt-3">Save Changes</x-primary-button>
            </form>
        </div>
    </div>
@endsection

