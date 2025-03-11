<?php

namespace App\Service\Transactions;
use App\Models\Transaction;
use Illuminate\Contracts\Validation\Factory as Validator;
use Illuminate\Validation\ValidationException;

class AllTransactions{
    private $transaction;
    private $validator;

    public function __construct(Transaction  $transaction, Validator $validator){
        $this->transaction = $transaction;
        $this->validator = $validator;
    }

    public function Validator($data){
        
        return $this->validator->make($data, [
            'date_criated' => "required",
            'type' => 'required|boolean',
            'value' => 'required|numeric',
            'category' => 'required',
            'description' => 'required'
        ]);
    }
    public function allData()
    {
        $transactions = $this->transaction::all(); 
        return $transactions;
    }

    public function createdTransaction($data){

        $data['date_criated'] = now();
        
            $validator = $this->Validator($data);

            if($validator->fails()){
                return$validator->errors();
            }

            try {
                $transaction = $this->transaction->create($data);
                return $transaction;
            } catch (\Exception $e) {
                return "Erro ao criar transação: " . $e->getMessage();
            }
    }

    public function destroyTransaction($id){
        $transaction = $this->transaction::findOrFail($id);

        $transaction->delete();
        return $transaction;
    }

    public function updateTransaction($id, $data)
    {
        $validator = $this->Validator($data);

        if ($validator->fails()) {
            return $validator->errors();
        }

        try {
            $transaction = $this->transaction->findOrFail($id);

            $transaction->update($data);

            return $transaction;
        } catch (\Exception $e) {
            return "Erro ao atualizar transação: " . $e->getMessage();
        }
    }

}