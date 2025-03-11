<?php

namespace App\Service\Transactions;


use Illuminate\Contracts\Validation\Factory as Validator;
use App\Models\Transaction;
use App\Models\Category;

class CategoryTransactions{
    private $category;
    private $validator;

    public function __construct(Category  $category, Validator $validator){
        $this->category = $category;
        $this->validator = $validator;
    }


    public function getCategory(){
        $get = $this->category::all();

        return $get;
    }

    public function newCategory($data){

        try {
            $category = $this->category->create($data);
            return $category;
        } catch (\Exception $e) {
            return "Erro ao criar categoria: " . $e->getMessage();
        }
    }

    public function deleteCategory($id){
        $category = $this->category::findOrFail($id);
        $category->delete();

        return $category;

    }
}