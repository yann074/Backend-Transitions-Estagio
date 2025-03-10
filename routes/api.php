
<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransitionController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'Login']);


Route::get('/all', [TransitionController::class, 'index']);
Route::post('/new_transitions', [TransitionController::class, 'store']);

