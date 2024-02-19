<?php

namespace App\FileKit;

use App\Enums\Disks;
use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class Upload extends AbstractFileKit
{

    /**
     *
     *
     * @throws ValidationException
     */
    public static function uploadFile($inputName, $namespace, $pk, $disk = null, $validation = null,  $hash=false): Upload|bool
    {
        $handel = new Upload($inputName, $disk, $validation);
        $handled = $handel->upload($namespace, $pk, $hash);
        if ($handled) return $handel;
        return false;
    }

    /**
     * @throws ValidationException
     */
    public static function uploadFiles($inputName, $namespace, $pk, $disk = null, $validation = null, $hash=false): Upload|bool
    {
        return self::uploadFile($inputName, $namespace, $pk, $disk, $validation,  $hash);
    }

    public static function rubOut(Image $image): int
    {
        return Upload::delete($image);
    }

    public static function eraseByName($name): int
    {
        return Upload::deleteByName($name);
    }

    public function getImages(): array
    {
        return $this->sortedFiles;
    }

    public function getImage()
    {
        return $this->sortedFiles[0];
    }

    public static function getFileByName($name)
    {
        return Image::getByNameAttribute($name);
    }



    public static function pushToDir($dir, $inputName): string|false
    {
        $request = request();
        if ($request->hasFile($inputName)) {
            $file = $request->file($inputName);
            $name =  Str::slug(Carbon::now()) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs($dir . '/' . $inputName, $name, Disks::Public->value);
            return $name;
        }
        return false;
    }

    public static function deleteContentFolder($folder, $subFolder): bool
    {
        $storage = Storage::disk('public');
        $flag = true;
        foreach ($storage->files($folder .'/' . $subFolder) as $file) {
            $flag = $storage->delete($file);
            if (!$flag) return $flag;
        }

        return $flag;
    }

}
