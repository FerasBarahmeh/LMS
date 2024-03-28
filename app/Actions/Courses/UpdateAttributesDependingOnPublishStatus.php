<?php

namespace App\Actions\Courses;

use App\Models\Course;

class UpdateAttributesDependingOnPublishStatus
{
    public static function execute(Course $course): bool
    {
        $service = $course->service();
        $publish = $service->publishStatus;
        $publish->curriculum_compass = $service->curriculumCompass();
        $publish->has_description = $service->hasDescription();
        $publish->has_course_image = $service->hasImage();
        $publish->has_promotional_video = $service->hasPromotional();
        $publish->is_free = $service->isFree();
        $publish->has_price = !$service->isFree();
        $publish->has_congratulations_message = $service->hasCongratulationsMessage();
        $publish->has_welcome_message = $service->hasWelcomeMessage();
        $service->updatePublishableStatus();
        return  $course->save() && $publish->save() ;
    }
}
