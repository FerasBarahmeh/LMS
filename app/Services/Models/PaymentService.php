<?php

namespace App\Services\Models;

use App\Enums\PaymentStatus;
use App\Models\Payment;

class PaymentService
{
    public static function createFreePaymentRecord($userId): Payment|null
    {
        return Payment::create([
            'user_id' => $userId,
            'amount' => 0,
            'status' => PaymentStatus::Completed->value,
        ]);
    }
}
