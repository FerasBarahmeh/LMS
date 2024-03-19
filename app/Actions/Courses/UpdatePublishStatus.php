<?php

namespace App\Actions\Courses;

use App\Models\Course;

class UpdatePublishStatus
{
    public static function execute(Course $course): bool
    {
        $coursePublishStatus = $course->setting->publishStatus;

        $coursePublishStatus->publish_status =
            $coursePublishStatus->has_lecture
            && $coursePublishStatus->has_description
            && $coursePublishStatus->has_course_image
            && $coursePublishStatus->has_promotional_video
            && ($coursePublishStatus->is_free || $coursePublishStatus->has_price)
            && $coursePublishStatus->has_congratulations_message
            && $coursePublishStatus->has_welcome_message;

        return
            $coursePublishStatus->publish_status
                ? $coursePublishStatus->save()
                : false;
    }
}
