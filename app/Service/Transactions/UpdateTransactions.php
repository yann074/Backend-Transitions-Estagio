<?php

namespace App\Service\Transactions;

use App\Service\ApiResponse;
use App\Models\Transaction;
use Illuminate\Contracts\Validation\Factory as Validator;
use Illuminate\Validation\ValidationException;

class UpdateTransactions
{
    private $transaction;
    private $validator;

    public function __construct(Transaction $transaction, Validator $validator)
    {
        $this->transaction = $transaction;
        $this->validator = $validator;
    }

    public function validateTransaction($data)
    {
        return $this->validator->make($data, [
            'type' => 'required|boolean',
            'value' => 'required|numeric',
            'categoria' => 'required|string',
            'descricao' => 'required|string'
        ]);
    }

    public function updateTransaction($id, $data)
    {
        $validator = $this->validateTransaction($data);

        if ($validator->fails()) {
            return ApiResponse::error($validator->errors());
        }

        try {
            $transaction = $this->transaction->findOrFail($id);

            $transaction->update($data);

            return ApiResponse::success($transaction);
        } catch (\Exception $e) {
            return ApiResponse::error("Erro ao atualizar transação: " . $e->getMessage(), 500);
        }
    }
}
