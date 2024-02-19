<?php

namespace App\FileKit;

use App\Models\Image;

trait DBOperation
{
    public function sortRecord($url, $imageableID, $imageableType, $nameFile, $disk): object
    {
        /*** @var object $img  by default contain object Image Model */

        $img = $img ?? new Image();
        $img->url = $url;
        $img->nameFile = $nameFile;
        $img->imageable_id = $imageableID;
        $img->imageable_type = $imageableType;
        $img->disk = $disk;
        $img->save();
        return $img;
    }

    public static function kickOutRecord($id): int
    {
        return Image::destroy($id);
    }
}
