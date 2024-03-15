<x-collapse-body id="content-lecture-{{ $lecture->id }}">
    <div class="pl-3 pr-3">
        <div class="mt-2">
            <p class="text-muted">{{ $lecture->description }}</p>
        </div>
        <livewire:courses.lecture-attachment :lecture="$lecture"/>
    </div>
</x-collapse-body>
