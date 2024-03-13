<?php

namespace App\Livewire\Courses;

use App\Models\CourseSection;
use App\Models\Lecturer;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AddLecture extends Component
{
    /**
     * Section the retry refer it
     *
     * @var CourseSection
     */
    public CourseSection $section;

    /**
     * Nane lecture
     * @return View
     */
    public string $name;

    /**
     * Lecture Description
     *
     * @var string|null
     */
    public string|null $description=null;

    /**
     * Order of new lecture
     *
     * @var int
     */
    public int $lectureOrder ;

    public function mount(): void
    {
        $this->lectureOrder = $this->section->lectures->count() + 1;
    }

    public function save(): void
    {
        $this->validate();
        Lecturer::create([
            'name' => $this->name,
            'description' => $this->description,
            'lecture_order' => $this->lectureOrder,
            'course_section_id' => $this->section->id,
        ]);
        $this->dispatch('lecture-content');
    }

    public function rules(): array
    {
        return [
           'name' => ['required', 'max:150', Rule::unique(Lecturer::class, 'name')],
           'description' => ['nullable', 'max:250'],
        ];
    }

    public function render(): View
    {
        return view('livewire.courses.add-lecture');
    }
}
