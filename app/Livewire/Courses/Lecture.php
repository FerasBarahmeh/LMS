<?php

namespace App\Livewire\Courses;

use App\Models\CourseSection;
use App\Models\Lecturer;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class Lecture extends Component
{
    use WithFileUploads;

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
     */
    public $lessonFile;

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

    public function uploadCompleted(): void
    {
        $this->validate();
        session()->flash('upload-lesson-success', 'finish upload lesson');
    }

    /**
     * Open upload file section
     *
     * @return void
     */
    public function openAddContentSection(): void
    {
        $this->addContentStage = ! $this->addContentStage;
    }

    public function rules(): array
    {
        return [
           'lessonFile' => ['required', 'mimes:mp4', 'max:500000'],
        ];
    }

    public function render(): View
    {
        return view('livewire.courses.lecture');
    }
}
