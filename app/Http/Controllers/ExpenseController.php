<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Http\Resources\ExpenseResourse;
use App\Models\Expense;
use Illuminate\Http\Response;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $expenses = Expense::all();
        $data = ExpenseResourse::collection($expenses);
        return Response::api($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param \App\Http\Requests\StoreExpenseRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreExpenseRequest $request)
    {
        $request->validated();
        $expense = Expense::create($request->all());
        $data = new ExpenseResourse($expense);
        return Response::api($data);
    }

    /**
     * Display the specified resource.
     * @param \App\Models\Expense $expense
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Expense $expense)
    {
        $data = new ExpenseResourse($expense);
        return Response::api($data);
    }

    /**
     * Update the specified resource in storage.
     * @param \App\Http\Requests\UpdateExpenseRequest $request
     * @param \App\Models\Expense $expense
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        $request->validated();
        $expense->update($request->all());
        $data = new ExpenseResourse($expense);
        return Response::api($data);
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Models\Expense $expense
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return Response::api(["message" => "Deleted Successfully"]);
    }
}
