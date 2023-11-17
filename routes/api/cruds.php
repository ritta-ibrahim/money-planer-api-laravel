<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;

Route::resource('/categories', CategoryController::class)->middleware('auth:api');
Route::resource('/currencies', CurrencyController::class)->middleware('auth:api');
Route::resource('/incomes', IncomeController::class)->middleware('auth:api');
Route::resource('/expenses', ExpenseController::class)->middleware('auth:api');
