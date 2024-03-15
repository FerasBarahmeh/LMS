<?php

namespace App\Enums;

use App\Traits\Enums\EnumOperations;

enum MediaCollections: string
{
    use EnumOperations;

    case User = 'user';

    case ProfilePicture = 'profile.picture';

    case CourseVideo = 'course.video';

    case    CourseDoc = 'course.doc';
}
