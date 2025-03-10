
<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'Login']);
Route::get('/logout', [AuthController::class, 'Logout']);


Route::middleware('auth:sanctum')->group(function() {
    Route::get('/all', [TransactionController::class, 'index']);
    Route::post('/new_transitions', [TransactionController::class, 'store']);
    Route::delete("/delet/{id}", [TransactionController::class, 'destroy']);
    Route::delete("/update/{id}", [TransactionController::class, 'update']);
    
});
