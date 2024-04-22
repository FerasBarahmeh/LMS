<?php

namespace App\Actions\Courses;

use App\Models\Course;
use App\Services\Models\PaymentService;
use App\Services\Models\TransactionService;
use Exception;
use Illuminate\Support\Facades\Auth;

class EnrollmentToCourseForFreeAction
{
    /**
     * @throws Exception
     */
    public static function execute(Course $course): Course
    {
        try {
            $payment = PaymentService::createFreePaymentRecord(Auth::id());
            TransactionService::createFreeTransactionRecord(Auth::id(), $payment->id);
            $course->users()->attach(Auth::id());
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        return $course;
    }
}
