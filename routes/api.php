
<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'Login']);
Route::get('/logout', [AuthController::class, 'Logout']);

//TRANSACTIONS
    Route::get('/transactions', action: [TransactionController::class, 'index']);
    Route::post('/transactions', [TransactionController::class, 'store']);
    Route::delete("/transactions/{id}", [TransactionController::class, 'destroy']);
    Route::put("/transactions/{id}", [TransactionController::class, 'update']);

//CATEGORY
    Route::get('/category', action: [TransactionController::class, 'index']);
    Route::post('/category', [TransactionController::class, 'store']);
    Route::delete("/category/{id}", [TransactionController::class, 'destroy']);

