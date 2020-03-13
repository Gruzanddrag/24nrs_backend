<?php

namespace App\Http\Controllers;

use App\Models\FaqQuestion;
use App\Models\FaqQuestionCategory;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return FaqQuestionCategory[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return FaqQuestionCategory::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function store(Request $request)
    {
        $category = new FaqQuestionCategory();
        $category->fill($request->all($category->getFillable()));
        try {
            $category->saveOrFail();
            return response()->json(array(
                'status' =>  true
            ));
        } catch (\Exception $e) {
            return response()->json(array(
                'status' => false,
                'msg' => $e
            ));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function update(Request $request, $id)
    {
        $category = FaqQuestionCategory::find($id);
        $category->fill($request->all($category->getFillable()));
        try {
            $category->saveOrFail();
            return response()->json(array(
                'status' =>  true
            ));
        } catch (\Exception $e) {
            return response()->json(array(
                'status' => false,
                'msg' => $e
            ));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $category = FaqQuestionCategory::find($id);
        if($category){
            // Move questions to "Others", witch attached to this category
            $category->questions->map(function (FaqQuestion $q){
                $q->category_id = 1;
                $q->saveOrFail();
            });
            try {
                $category->delete();
                return response()->json(array(
                    'status' =>  true
                ));
            } catch (\Exception $e) {
                return response()->json(array(
                    'status' => false,
                    'msg' => $e
                ));
            }
        }
    }
}
