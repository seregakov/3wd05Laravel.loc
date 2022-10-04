<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Mockery\Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
//        return new CategoryCollection($categories);
        return response()->json(new CategoryCollection($categories));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::create($request->all());
//        return new CategoryResource($category);

        try {
            return new CategoryResource($category);
        } catch (\Exception $exception){
            return response()
                ->json(['errors' => $exception->getMessage()])
                ->setStatusCode(500);
        }
        return response()->json(new CategoryResource($category));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

//        try {
//            return new CategoryResource($category);
//        } catch (\Exception $exception){
//            return response()
//                ->json(['errors' => $exception->getMessage()])
//                ->setStatusCode(500);
//        }
        return response()
            ->json(new CategoryResource($category))
            ->setStatusCode(201);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->fill($request->all())->save();
//        return new CategoryResource($category);
        return response()->json(new CategoryResource($category));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return new CategoryResource($category);
    }
}
