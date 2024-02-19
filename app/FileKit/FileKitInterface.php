<?php

namespace App\FileKit;

use App\Models\Image;

interface FileKitInterface
{
    /**
     * @param string $type namespace for model refer to
     * @param int|string $id primary key in this model
     * @return string|bool
     */
    public function upload(string $type, int|string $id): bool|string|array;

    public static function delete(Image $image);

    public function fileInputExists(): bool|string;
    public function generateFileName(): string;


}
