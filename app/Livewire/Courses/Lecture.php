<?php

namespace App\Livewire\Courses;

use App\Models\CourseSection;
use App\Models\Lecturer;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rules\File;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Lecture extends Component
{
    /**
     * Section followed to lecture
     *
     * @var CourseSection
     */
    public CourseSection $section;

    /**
     * Lecturer for section
     *
     * @var Lecturer
     */
    public Lecturer $lecture;

    /**
     * If section to add content open
     *
     * @var bool
     */
    public bool $addContentStage = true;

    /**
     * If edit name button clicked
     *
     * @var bool
     */
    public bool $editNameStage = false;

    /**
     * Name lecture
     *
     * @var string
     */
    public string $lectureName;

    /**
     * Lesson video
     *
     * @var
     */
    public $lesson;

    /**
     * Livewire constructor
     *
     * @return void
     */
    public function mount(): void
    {
        if (empty($this->lecture)) $this->lecture = new Lecturer();
    }

    /**
     * If field for edit name lecture  shown or not
     *
     * @return void
     */
    public function toggleEditNameStage(): void
    {
        $this->editNameStage = ! $this->editNameStage;
    }

    /**
     * Add name to lecture object
     *
     * @return void
     */
    public function addName(): void
    {
        $this->lecture->name = $this->lectureName;
        $this->toggleEditNameStage();
    }

    /**
     * Refresh lecture object
     *
     * @return void
     */
    public function refresh(): void
    {
        $this->lectureName = '';
        $this->editNameStage = false;
        $this->lecture-> name = null;
    }

    public function rules(): array
    {
        return [
           'lesson' => ['required', File::types(['mp3', 'wav'])
               ->max('500mb'),]
        ];
    }

    public function render(): View
    {
        return view('livewire.courses.lecture');
    }
}
