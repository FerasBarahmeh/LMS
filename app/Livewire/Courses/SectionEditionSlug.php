<?php

namespace App\Livewire\Courses;

use App\Models\Course;
use App\Models\CourseSection;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SectionEditionSlug extends Component
{
    /**
     * Section has edit
     *
     * @var CourseSection
     */
    public CourseSection $section;

    /**
     * The Course follow for this section
     *
     * @var Course
     */
    public Course $course;

    /**
     * If name section has updated
     *
     * @var bool
     */
    public bool $updateNameStage = false;

    #[Validate('required|')]
    public string $nameSection;

    /**
     * Livewire constructor
     *
     * @return void
     */
    public function mount(): void
    {
        $this->nameSection  = $this->section->title;
    }

    /**
     * Change to update name stage
     *
     * @return void
     */
    public function toggleUpdateNameStage(): void
    {
        $this->updateNameStage = ! $this->updateNameStage;
    }

    /**
     * Save new section title
     *
     * @return void
     */
    public function saveSectionName(): void
    {
        $this->section->title =$this->nameSection;
        $this->section->save();
        $this->updateNameStage = false;
    }

    public function togglePublishStatus(): void
    {
        $this->section->published = !$this->section->published;
        $this->section->save();
    }

    public function rules(): array
    {
        return [
            'nameSection' => ['required', 'min:3', 'max:100', Rule::unique(CourseSection::class)],
        ];
    }

    public function render(): View
    {
        return view('livewire.courses.section-edition-slug');
    }
}
