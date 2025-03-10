<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Service\Transactions\AllTransactions;
use App\Service\Transactions\CreateTransactions;
use App\Service\Transactions\UpdateTransactions;
use App\Service\Transactions\DestroyTransactions;
use App\Service\ApiResponse;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    private $createTransactions;
    private $destroyTransactions;
    private $updateTransactions;
    private $allTransactions;

    //REFERENCIAR AO SERVICE
    public function __construct(CreateTransactions $createTransactions, AllTransactions $allTransactions, UpdateTransactions $updateTransactions, DestroyTransactions $destroyTransactions){
        $this->createTransactions = $createTransactions;
        $this->allTransactions = $allTransactions;
        $this->updateTransactions = $updateTransactions;
        $this->destroyTransactions = $destroyTransactions;
    }

    //TRAZER TODOS OS DADOS
    public function index()
    {
        try{
            $this->allTransactions->allData();
        }catch (\Exception $e) {

            return ApiResponse::error($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $data = [
                "type" => $request->type,
                "value" => $request->value,
                "categoria" => $request->categoria,
                "descricao" => $request->descricao,
            ];

            return $this->createTransactions->createdTransaction( $data);
        } catch (\Exception $e) {

            return ApiResponse::error($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = Transaction::find($id);
        try{
            $data = [
                "type" => $request->type,
                "value" => $request->value,
                "categoria" => $request->categoria,
                "descricao" => $request->descricao,
            ];

            return $this->updateTransactions->updateTransaction($id, $data);
        } catch (\Exception $e) {

            return ApiResponse::error($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            return $this->destroyTransactions->destroyTransaction($id);
        }catch (\Exception $e) {

            return ApiResponse::error($e->getMessage());
        }
    }
}
