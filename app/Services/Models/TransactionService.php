<?php

namespace App\Services\Models;

use App\Enums\PaymentMethod;
use App\Models\Transaction;

class TransactionService
{
    public static function createFreeTransactionRecord($userId, $paymentId): Transaction|null
    {
        return Transaction::create([
            'amount' => 0,
            'payment_method' => (string)PaymentMethod::Free->value,
            'user_id' => $userId,
            'payment_id' => $paymentId
        ]);
    }
}
