<?php

namespace App\Service\Transactions;

use App\Service\ApiResponse;
use App\Models\Transaction;
use Illuminate\Contracts\Validation\Factory as Validator;
use Illuminate\Validation\ValidationException;

class CreateTransactions{

    private $transaction;
    private $validator;
    private $response;

    public function __construct(Transaction  $transaction, ApiResponse $response, Validator $validator){
        $this->transaction = $transaction;
        $this->response = $response;
        $this->validator = $validator;
    }

    public function Validator($data){
        return $this->validator->make($data, [
            'type' => 'required|boolean',
            'value' => 'required|numeric',
            'categoria' => 'required',
            'descricao' => 'required'
        ]);
    }

    public function createdTransaction($data){
        
            $validator = $this->Validator($data);

            if($validator->fails()){
                return $this->response->error($validator->errors());
            }

            try {
                $transaction = $this->transaction->create($data);
                return $this->response->success($transaction);
            } catch (\Exception $e) {
                return $this->response->error("Erro ao criar transação: " . $e->getMessage());
            }
    }
    
}