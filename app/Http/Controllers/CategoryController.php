<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResourse;
use App\Models\Category;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $categories = Category::all();
        $data = CategoryResourse::collection($categories);
        return Response::api($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param \App\Http\Requests\StoreCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreCategoryRequest $request)
    {
        $request->validated();
        $category = Category::create($request->all());
        $data = new CategoryResourse($category);
        return Response::api($data);
    }

    /**
     * Display the specified resource.
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Category $category)
    {
        $data = new CategoryResourse($category);
        return Response::api($data);
    }

    /**
     * Update the specified resource in storage.
     * @param \App\Http\Requests\UpdateCategoryRequest $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $request->validated();
        $category->update($request->all());
        $data = new CategoryResourse($category);
        return Response::api($data);
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return Response::api(["message" => "Deleted Successfully"]);
    }
}
