<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Service\Transactions\AllTransactions;
use App\Service\ApiResponse;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    private $allTransactions;

    //REFERENCIAR AO SERVICE
    public function __construct(AllTransactions $allTransactions){

        $this->allTransactions = $allTransactions;
    }

    //TRAZER TODOS OS DADOS
    public function index()
    {
        try{
            $data = $this->allTransactions->allData();
            return ApiResponse::success($data);
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
                "category" => $request->category,
                "description" => $request->description,
            ];

            return $this->allTransactions->createdTransaction( $data);
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
                "category" => $request->category,
                "description" => $request->description,
            ];

            return $this->allTransactions->updateTransaction($id, $data);
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
            return $this->allTransactions->destroyTransaction($id);
        }catch (\Exception $e) {
 
            return ApiResponse::error($e->getMessage());
        }
    }
}
