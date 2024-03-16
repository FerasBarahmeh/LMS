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
     * Section title
     */
    public string $title;

    /**
     * Objective for section
     */
    public string $objective;

    /**
     * The course id I am following is this section
     */
    #[Locked]
    public int|string $courseID;

    /**
     * Save section
     *
     * @return void
     */
    public function save(): void
    {
        $values = array_merge($this->validate(), ['course_id' => $this->courseID]);
        CourseSection::create($values);
        session()->flash('create-section-success', 'Section add successfully modify it to be professional.');
        $this->reset(['courseID', 'title', 'objective']);
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
