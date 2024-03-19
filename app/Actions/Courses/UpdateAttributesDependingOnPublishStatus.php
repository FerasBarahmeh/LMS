<?php

namespace App\Actions\Courses;

use App\Models\Course;

class UpdateAttributesDependingOnPublishStatus
{
    public static function execute(Course $course): bool
    {
        $service = $course->service();
        $publish = $course->setting->publishStatus;
        $publish->has_lecture = $service->hasLecture();
        $publish->has_lecture = $service->hasLecture();
        $publish->has_description = $service->hasDescription();
        $publish->has_course_image = $service->hasCourseImage();
        $publish->has_promotional_video = $service->hasCoursePromotion();
        $publish->is_free = $service->isFree();
        $publish->has_price = !$service->isFree();
        $publish->has_congratulations_message = $service->hasCongratulationsMessage();
        $publish->has_welcome_message = $service->hasWelcomeMessage();
        UpdatePublishStatus::execute($course);
        return $publish->save();
    }
}
