<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\Transactions\CategoryTransactions;
use App\Service\ApiResponse;

class CategoryController extends Controller
{

    private $category;

    public function __construct(CategoryTransactions $category){
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $data = $this->category->getCategory();
            return ApiResponse::success($data);
        }catch (\Exception $e) {

            return ApiResponse::error($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */public function store(Request $request)
{
    try {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        return $this->category->newCategory($validated);
    } catch (\Illuminate\Validation\ValidationException $e) {
        return ApiResponse::error($e->errors()); // Retorna os erros de validação
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
            return $this->category->deleteCategory($id);
        }catch (\Exception $e) {
 
            return ApiResponse::error($e->getMessage());
        }
    }
}
