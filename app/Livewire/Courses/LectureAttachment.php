<?php

namespace App\Livewire\Courses;

use App\Enums\MediaCollections;
use App\Models\Lecturer;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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
     * The type of file be uploaded
     *
     * @var string
     */
    public string $fileType = MediaCollections::CourseVideo->value;

    /**
     * File Video
     *
     * @var TemporaryUploadedFile|null
     */
    public TemporaryUploadedFile|null $videoFile = null;

    /**
     * Document file
     *
     * @var TemporaryUploadedFile|null
     */
    public TemporaryUploadedFile|null $docFile = null;

    public function mount(): void
    {
        $this->hasAttachments = $this->lecture->hasAttachments();
    }

    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function uploadComplete(): void
    {
        if ($this->fileType == MediaCollections::CourseVideo->value)
            $this->uploadVideoComplete();
        else
            $this->uploadDocComplete();
    }

    /**
     * Upload video file
     *
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    public function uploadVideoComplete(): void
    {
        if ($this->lecture->media()->where('collection_name', MediaCollections::CourseVideo->value)->exists()) {
           session()->flash('already-has-lesson', 'The lecture has video lesson already');
            return;
        }

        $this->validate();

        $this->lecture
            ->addMedia($this->videoFile->getRealPath())
            ->toMediaCollection(MediaCollections::CourseVideo->value);

        $this->reset('videoFile');
    }

    /**
     * Upload document file
     *
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function uploadDocComplete(): void
    {
        $this->validate();
        $this->lecture
            ->addMedia($this->docFile->getRealPath())
            ->toMediaCollection(MediaCollections::CourseDoc->value);

        $this->reset('docFile');
    }

    public function rid($id): void
    {
        Media::find($id)->delete();
    }

    public function rules(): array
    {
        return [
            'videoFile' => ['nullable', 'mimes:mp4', 'max:500000'],
            'docFile' => ['nullable', 'mimes:pdf', 'max:10485760'],
        ];
    }

    public function render(): View
    {
        return view('livewire.courses.lecture-attachment');
    }
}
