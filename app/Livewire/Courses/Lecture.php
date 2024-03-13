<?php

namespace App\Livewire\Courses;

use App\Models\Lecturer;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Lecture extends Component
{
    /**
     * Lecture
     * @var Lecturer
     */
    public Lecturer $lecture;

    /**
     * Lecture name
     *
     * @var string
     */
    public string $name;

    public function mount(): void
    {
        $this->name = $this->lecture->name;
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

    /**
     * Rules for validation
     *
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:150', Rule::unique(Lecturer::class)->ignore($this->lecture->id)]
        ];
    }

    public function render(): View
    {
        return view('livewire.courses.lecture');
    }
}
