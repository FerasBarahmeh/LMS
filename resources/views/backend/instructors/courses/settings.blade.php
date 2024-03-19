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
            </div>
        </div>
    </section>

@endsection
