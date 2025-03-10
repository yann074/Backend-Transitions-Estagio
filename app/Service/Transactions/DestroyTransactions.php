<?php 

namespace App\Service\Transactions;

use App\Service\ApiResponse;
use App\Models\Transaction;
use Illuminate\Contracts\Validation\Factory as Validator;
use Illuminate\Validation\ValidationException;

class DestroyTransactions{
    private $transaction;
    private $validator;
    private $response;

    public function __construct(Transaction  $transaction, ApiResponse $response, Validator $validator){
        $this->transaction = $transaction;
        $this->response = $response;
        $this->validator = $validator;
    }

    public function destroyTransaction($id){
        $transaction = $this->transaction::findOrFail($id);

        $transaction->delete();
        return ApiResponse::success($transaction);
    }
}