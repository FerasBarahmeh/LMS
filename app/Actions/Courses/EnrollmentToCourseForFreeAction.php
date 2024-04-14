<?php

namespace App\Actions\Courses;

use App\Models\Course;
use App\Services\Models\PaymentService;
use App\Services\Models\TransactionService;
use Exception;

class EnrollmentToCourseForFreeAction
{
    /**
     * @throws Exception
     */
    public static function execute(Course $course, mixed $user): Course
    {
        try {
            $payment = PaymentService::createFreePaymentRecord($user->id);
            TransactionService::createFreeTransactionRecord($user->id, $payment->id);
            $course->users()->attach($user->id);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        return $course;
    }
}
