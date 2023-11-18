<?php
use App\Http\Controllers\UserController;

Route::prefix('user')->group(function () {
    Route::get('/categories', [UserController::class, 'getCategories']);
    Route::get('/incomes', [UserController::class, 'getIncomes']);
    Route::get('/expenses', [UserController::class, 'getExpenses']);
})->middleware('auth:api');
