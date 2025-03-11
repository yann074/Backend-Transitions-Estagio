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
        $transactions = Transaction::with('category')->get(); 
    
        return $transactions->map(function ($transaction) {
            return [
                'id' => $transaction->id,
                'value' => $transaction->value,
                'description' => $transaction->description,
                'type' => $transaction->type,
                'created_at' => $transaction->created_at,
                'category' => $transaction->category->name ?? 'Sem categoria'
            ];
        });
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