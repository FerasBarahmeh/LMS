<?php

namespace App\Livewire\Courses;

use App\Models\Course;
use App\Models\CourseSection;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
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
     * Object has information for iteration
     *
     * @var object
     */
    public object $loop;

    /**
     * If name section has updated
     *
     * @var bool
     */
    public bool $updateNameStage = false;

    /**
     * Section name
     *
     * @var string
     */
    public string $nameSection;

    /**
     * Section objective
     *
     * @var string|null
     */
    public string|null $objective;

    /**
     * Livewire constructor
     *
     * @return void
     */
    public function mount(): void
    {
        $this->nameSection  = $this->section->title;
        $this->objective  = $this->section->objective;
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

    /**
     * Toggle status section
     *
     * @return void
     */
    public function togglePublishStatus(): void
    {
        $this->section->published = !$this->section->published;
        $this->section->save();
    }

    public function changeObjective(): void
    {
       $this->section->objective = $this->objective;
       $this->section->save();
       session()->flash('change-objective-success', 'success changed objectives');
    }

    public function rules(): array
    {
        return [
            'nameSection' => ['required', 'min:3', 'max:100', Rule::unique(CourseSection::class)],
            'objective' => ['nullable', 'min:3', 'max:200'],
        ];
    }

    #[On('lecture-content')]
    public function render(): View
    {
        return view('livewire.courses.section-edition-slug');
    }
}
