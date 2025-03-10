<?php

namespace App\Service\Transactions;

use App\Models\Transaction;
use App\Service\ApiResponse;

class AllTransactions{
    private $transaction;

    public function __construct(Transaction $transaction){
        $this->transaction = $transaction;
    }

    public function allData()
    {
        $transactions = $this->transaction->all(); // Obtém todas as transações
        return ApiResponse::success($transactions);
    }


}