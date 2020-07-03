<?php

namespace App\Http\Controllers;

use App\Models\FaqQuestion;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return FaqQuestion[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index($id)
    {
        return FaqQuestion::where('category_id','=',$id)->get();
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
        $question = new FaqQuestion();
        $question->fill($request->all($question->getFillable()));
        try {
            $question->saveOrFail();
            return response()->json(array(
                'status' => true
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
        $question = FaqQuestion::find($id);
        $question->fill($request->all($question->getFillable()));
        try {
            $question->saveOrFail();
            return response()->json(array(
                'status' => true
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
        $question = FaqQuestion::find($id);
        try {
            $question->delete();
            return response()->json(array(
                'status' => true
            ));
        } catch (\Exception $e) {
            return response()->json(array(
                'status' => false,
                'msg' => $e
            ));
        }
    }
}
