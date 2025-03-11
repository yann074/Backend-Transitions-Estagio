<?php

namespace App\Service\Transactions;
use App\Models\Transaction;
use Illuminate\Validation\ValidationException;

class AllTransactions{
    private $transaction;

    public function __construct(Transaction  $transaction){
        $this->transaction = $transaction;
    }

 
    
    public function allData()
    {
        $transactions = $this->transaction::all(); 
        return $transactions;
    }
    public function allDataSpecific($id)
    {
        $transaction = $this->transaction::findOrFail($id);
        return $transaction;
    }

    public function createdTransaction($data){

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

        try {
            $transaction = $this->transaction->findOrFail($id);

            $transaction->update($data);

            return $transaction;
        } catch (\Exception $e) {
            return "Erro ao atualizar transação: " . $e->getMessage();
        }
    }

}