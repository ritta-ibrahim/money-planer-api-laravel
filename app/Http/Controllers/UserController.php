<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class UserController extends Controller
{
    public function getCategories()
    {
        $user = auth('api')->user();
        $categories = $user->categories;
        return Response::api($categories);
    }

    public function getIncomes()
    {
        $user = auth('api')->user();
        $incomes = $user->incomes;
        return Response::api($incomes);
    }

    public function getExpenses()
    {
        $user = auth('api')->user();
        $expenses = $user->expenses;
        return Response::api($expenses);
    }
}
