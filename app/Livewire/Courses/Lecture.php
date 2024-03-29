<?php

namespace App\Livewire\Courses;

use App\Actions\Courses\UpdateAttributesDependingOnPublishStatus;
use App\Models\Lecture as LectureModel;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Lecture extends Component
{
    /**
     * Lecture
     * @var LectureModel
     */
    public LectureModel $lecture;

    /**
     * Lecture name
     *
     * @var string
     */
    public string $name;

    /**
     * Description lecture
     *
     * @var string|null
     */
    public string|null $description = null;

    public function mount(): void
    {
        $this->name = $this->lecture->name;
        $this->description = $this->lecture->description;
    }

    /**
     * Update lecture name
     *
     * @return void
     */
    public function changeName(): void
    {
        $this->lecture->name = $this->name;
        $this->lecture->save();
    }

    public function togglePublishStatus(): void
    {
        $this->lecture->published = !$this->lecture->published;
        $this->lecture->save();
        UpdateAttributesDependingOnPublishStatus::execute($this->lecture->section->course);
    }

    public function changeDescription(): void
    {
        $this->lecture->description = $this->description;
        $this->lecture->save();
        $this->reset('description');
        session()->flash('success-update-description', 'success update description');
    }

    /**
     * Rules for validation
     *
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:150', Rule::unique(Lecture::class)->ignore($this->lecture->id)],
            'description' => ['required', 'max:250'],
        ];
    }

    public function render(): View
    {
        return view('livewire.courses.lecture');
    }
}
