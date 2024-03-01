<?php

namespace App\Livewire\Courses;

use App\Models\Course;
use App\Models\CourseSection;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Locked;
use Livewire\Component;

class AddSection extends Component
{
    /**
     * If section body open or not
     *
     * @var bool
     */
    #[Locked]
    public bool $addSectionBodyOpen = false;

    /**
     * Section title
     *
     * @var string
     */
    public string $title;

    /**
     * Objective for section
     *
     * @var string
     */
    public string $objective;

    /**
     * The course id I am following is this section
     *
     * @var int
     */
    #[Locked]
    public int $courseID;

    /**
     * If section is saved
     *
     * @var bool
     */
    public bool $saved = false;

    /**
     * The section will add
     *
     * @var object
     */
    public object $section;

    /**
     * Course the section belong to
     *
     * @var Course
     */
    public Course $course;

    /**
     * Expand add section card
     *
     * @return void
     */
    public function openAddSectionBody(): void
    {
        $this->addSectionBodyOpen = !$this->addSectionBodyOpen;
    }

    /**
     * Save section
     *
     * @return void
     */
    public function save(): void
    {
        $values = array_merge($this->validate(), ['course_id' => $this->courseID]);
        $this->section = CourseSection::create($values);
        session()->flash('create-section-success', 'Section add successfully.');
        $this->reset(['courseID', 'title', 'objective']);
        $this->addSectionBodyOpen = false;
        $this->saved = true;
        $this->course = $this->section->course;
    }

    /**
     * Rules validation array
     *
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'min:3', 'max:100', Rule::unique(CourseSection::class)],
            'objective' => 'nullable|max:200',
            'courseID' => ['required', Rule::exists(Course::class, 'id')],
        ];
    }

    public function render(): View
    {
        return view('livewire.courses.add-section');
    }
}
