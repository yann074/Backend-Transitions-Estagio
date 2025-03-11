<?php

namespace App\Service\Transactions;

use App\Models\Category;

class CategoryTransactions{
    private $category;

    public function __construct(Category  $category){
        $this->category = $category;
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