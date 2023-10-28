<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;
use App\Http\Resources\CurrencyResourse;
use App\Models\Currency;
use Illuminate\Http\Response;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $currencies = Currency::all();
        $data = CurrencyResourse::collection($currencies);
        return Response::api($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param \App\Http\Requests\StoreCurrencyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreCurrencyRequest $request)
    {
        $request->validated();
        $currency = Currency::create($request->all());
        $data = new CurrencyResourse($currency);
        return Response::api($data);
    }

    /**
     * Display the specified resource.
     * @param \App\Models\Currency $currency
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Currency $currency)
    {
        $data = new CurrencyResourse($currency);
        return Response::api($data);
    }

    /**
     * Update the specified resource in storage.
     * @param \App\Http\Requests\UpdateCurrencyRequest $request
     * @param \App\Models\Currency $currency
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCurrencyRequest $request, Currency $currency)
    {
        $request->validated();
        $currency->update($request->all());
        $data = new CurrencyResourse($currency);
        return Response::api($data);
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Models\Currency $currency
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Currency $currency)
    {
        $currency->delete();
        return Response::api(["message" => "Deleted Successfully"]);
    }
}
