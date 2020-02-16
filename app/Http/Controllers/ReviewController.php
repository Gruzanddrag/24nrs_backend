<?php

namespace App\Http\Controllers;

use App\Http\Resources\Review\ReviewCollection;
use App\Http\Resources\Review\ReviewFull;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ReviewCollection
     */
    public function index()
    {
        return new ReviewCollection(Review::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $r
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function create(Request $r)
    {
        $review = new Review();
        $review->fill(request($review->getFillable()));
        $review->saveOrFail();
        return response()->json(
            array(
                'status' => true
            )
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ReviewFull
     */
    public function show($id)
    {
        return new ReviewFull(Review::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function update(Request $r, $id)
    {
        $review = Review::find($id);
        $review->fill(request($review->getFillable()));
        $review->saveOrFail();
        return response()->json(
            array(
                'status' => true
            )
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $review = Review::find($id);
        try {
            $review->delete();
            return response()->json(array(
                'status' => true
            ));
        } catch (\Exception $e){
            return response()->json(array(
                'status' => false,
                'mssg' => $e
            ));
        }
    }
}
