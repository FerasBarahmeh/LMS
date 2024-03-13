<x-collapse-body id="content-section-{{ $section->id }}">

    <div class="container">
        <!-- Objective -->
        <div class="mt-2">
            <h5 class="text-gray d-flex justify-content-between m-0">
                <span>Objective</span>
                <x-courses.edit-objective-button id="{{ $section->id }}" icon="edit">Edit</x-courses.edit-objective-button>
            </h5>
            <p class="pl-3 pr-3 text-muted">{{ $section->objective }}</p>
        </div>

        <!-- Lectures -->
        <div class="mt-2">
            <h5 class="text-gray d-flex justify-content-between align-items-center m-0">
                <span>Lectures</span>
                <x-courses.add-lecture-button icon="plus">Add new</x-courses.add-lecture-button>
            </h5>

            <div class="d-flex flex-column gap-5">
                @foreach($section->lectures as $lecture)
                    <livewire:courses.lecture :lecture="$lecture"/>
                @endforeach
            </div>
        </div>
    </div>
</x-collapse-body>
