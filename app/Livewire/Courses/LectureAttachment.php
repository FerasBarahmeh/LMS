<?php

namespace App\Livewire\Courses;

use App\Models\Lecturer;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class LectureAttachment extends Component
{
    use WithFileUploads;

    public Lecturer $lecture;

    /**
     * If lecture has attachments
     *
     * @var bool
     */
    public bool $hasAttachments;

    /**
     * Array all attachments for lecture
     *
     * @var array
     */
    public array $attachments = [];

    /**
     * File Video
     *
     * @var TemporaryUploadedFile|null
     */
    public TemporaryUploadedFile|null $videoFile = null;

    public function mount(): void
    {
        $this->hasAttachments = $this->lecture->hasAttachments();
    }


    public function uploadComplete()
    {
        $this->validate();
    }


    public function rules(): array
    {
        return [
            'videoFile' => ['required', 'mimes:mp4', 'max:500000'],
        ];
    }

    public function render(): View
    {
        return view('livewire.courses.lecture-attachment');
    }
}
