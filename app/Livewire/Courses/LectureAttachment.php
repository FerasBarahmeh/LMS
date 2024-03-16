<?php

namespace App\Livewire\Courses;

use AllowDynamicProperties;
use App\Enums\MediaCollections;
use App\Enums\TypeAttachments;
use App\Models\LectureAttachment as Attachment;
use App\Models\Lecture;
use App\Services\Models\LectureService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\FileNotPreviewableException;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

#[AllowDynamicProperties] class LectureAttachment extends Component
{
    use WithFileUploads;

    public Lecture $lecture;

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

    public LectureService $lectureService ;

    public function mount(): void
    {
        $this->lectureService = new LectureService($this->lecture);
        $this->hasAttachments = $this->lectureService->hasAttachments();
    }

    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     * @throws FileNotPreviewableException
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
     * @throws FileNotPreviewableException
     */
    public function uploadVideoComplete(): void
    {
        if ($this->lectureService->hasVideoAttachment()) {
            session()->flash('already-has-lesson', 'The lecture has video lesson already');
            return;
        }

        $this->validate();

        $attachment = Attachment::create([
            'type_attachment' => TypeAttachments::Video->value,
            'lecturer_id' => $this->lecture->id,
        ]);

        $attachment
            ->addMedia($this->videoFile->getRealPath())
            ->toMediaCollection(MediaCollections::CourseVideo->value);

        $this->hasAttachments = true;
        $this->reset('videoFile');
    }

    /**
     * Upload document file
     *
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     * @throws FileNotPreviewableException
     */
    public function uploadDocComplete(): void
    {
        $this->validate();

        $attachment = Attachment::create([
            'type_attachment' => TypeAttachments::File->value,
            'lecturer_id' => $this->lecture->id
        ]);

        $attachment
            ->addMedia($this->docFile->getRealPath())
            ->toMediaCollection(MediaCollections::CourseDoc->value);

        $this->hasAttachments = true;
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
