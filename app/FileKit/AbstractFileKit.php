<?php

namespace App\FileKit;

use App\Enums\Disks;
use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AbstractFileKit implements FileKitInterface
{
    use HelperFileKit, DBOperation;

    protected $request;
    /**
     * validation requirements
     *
     * @var string|array
     */
    protected string|array $validation = 'required|file|image|mimes:png,jpg,jpeg';
    /**
     * messages validation
     *
     * @var string|array
     */
    protected string|array $messageValidation = [
        "dimensions" => "The image has invalid image dimensions. must width less 500px height less 500px",
    ];

    /**
     * The Disk value you want upload files
     *
     * the default value in public disk
     *
     * @var int|string
     */
    protected int|string $disk;
    /**
     * Name input file
     *
     * @var string
     */
    protected string $inputName;

    protected string $folderKit = 'FilesKit';

    /**
     *
     * The File going to upload
     *
     * @var mixed|null
     */
    protected array|null $files = null;

    /**
     * The File sorted successfully
     *
     * @var array
     */
    public array $sortedFiles = [];

    public function __construct(string $inputName, $disk = null, string|array $validation = null)
    {
        $this->request = request();
        $this->inputName = $inputName;
        $this->files = $this->getFilesAsArray();
        $this->validation = $validation ?? $this->validation;
        $this->disk = $disk ?? Disks::Public->value;
    }

    protected function getFilesAsArray(): array|UploadedFile
    {
        $files = $this->getFiles();
        $files = is_array($files) ? $files : [$files];
        return $this->files = $files;
    }


    /**
     * Check if a file with the given input name exists in the request.
     * @return bool|string True if a file with the specified input name exists in the request; otherwise, false.
     */
    public function fileInputExists(): bool|string
    {
        if (!$this->request->hasFile($this->inputName)) {
            return false;
        }
        return $this->inputName;
    }


    /**
     * Generate a unique file name based on the user-provided name and file extension.
     *
     * @param mixed|null $file if you want specific file else take a file from request
     * @param bool $hash if name file hashed
     *
     * @return string A unique file name combining the sanitized user-provided name and the original file extension.
     */
    public function generateFileName(mixed $file = null, bool $hash = false): string
    {
        $file = $file ?? $this->request->file($this->inputName);
        if ($hash)
            return Hash::make(Str::slug(Carbon::now())) . '.' . $file->getClientOriginalExtension();
        return Str::slug(Carbon::now()) . '-' . time() . '-' . rand() .  '.' . $file->getClientOriginalExtension();
    }



    /**
     * Validate an uploaded file against specified rules or default image rules.
     *
     * This method performs validation on an uploaded file based on the provided validation rules
     * or the default image validation rules if none are specified. It throws a ValidationException
     * if the validation fails.
     *
     * @throws ValidationException If the validation fails.
     */
    protected function validation($file = null): null|bool
    {
        $file = $file ?? $this->inputName;
        $validation = $validation ?? $this->validation;

        $validator = Validator::make($this->request->all(), [
            $file => $validation,
        ], $this->messageValidation);


        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        return $this->inputName;
    }

    /**
     * Get Files in request
     *
     * @return array|UploadedFile|null
     */
    public function getFiles(): array|UploadedFile|null
    {
        return $this->request->file($this->inputName);
    }

    /**
     * @throws ValidationException
     */
    public function upload(string $type, int|string $id,  $hash=false): bool|string|array
    {
        $this->folderKit = $folderKit ?? $this->getFolderName($type);
        $this->inputName = $this->fileInputExists();

        if ($this->inputName) {
            foreach ($this->files as $index => $file) {
                $nameFile = $this->generateFileName($file, $hash);
                if ($file->storeAs($this->folderKit, $nameFile, $this->disk)) {
                    $image = $this->sortRecord($this->folderKit . DIRECTORY_SEPARATOR . $nameFile, $id, $type, $nameFile, $this->disk);
                    $this->sortedFiles[] = $image;
                }
            }
            if (count($this->sortedFiles) == count($this->files)) return $this->sortedFiles;
        }
        return false;
    }

    /**
     * Delete file by image object
     *
     * @param Image $image
     * @return int
     */
    public static function delete(Image $image): int
    {
        File::delete(Storage::disk($image->disk)->path($image->url));
        return self::kickOutRecord($image->id);
    }

    /**
     * Delete file by name file
     *
     * @param string $name
     * @return int
     */
    public static function deleteByName(string $name): int
    {
        $image = Image::getByNameAttribute($name);
        return self::delete($image);
    }

}
