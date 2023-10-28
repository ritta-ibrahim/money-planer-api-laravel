<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;
use App\Http\Resources\IncomeResourse;
use App\Models\Income;
use Illuminate\Http\Response;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $incomes = Income::all();
        $data = IncomeResourse::collection($incomes);
        return Response::api($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param \App\Http\Requests\StoreIncomeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreIncomeRequest $request)
    {
        $request->validated();
        $income = Income::create($request->all());
        $data = new IncomeResourse($income);
        return Response::api($data);
    }

    /**
     * Display the specified resource.
     * @param \App\Models\Income $income
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Income $income)
    {
        $data = new IncomeResourse($income);
        return Response::api($data);
    }

    /**
     * Update the specified resource in storage.
     * @param \App\Http\Requests\UpdateIncomeRequest $request
     * @param \App\Models\Income $income
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateIncomeRequest $request, Income $income)
    {
        $request->validated();
        $income->update($request->all());
        $data = new IncomeResourse($income);
        return Response::api($data);
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Models\Income $income
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Income $income)
    {
        $income->delete();
        return Response::api(["message" => "Deleted Successfully"]);
    }
}
