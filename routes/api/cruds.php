<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;

Route::resource('/categories', CategoryController::class);
Route::resource('/currencies', CurrencyController::class);
Route::resource('/incomes', IncomeController::class);
Route::resource('/expenses', ExpenseController::class);
