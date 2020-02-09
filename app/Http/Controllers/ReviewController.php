<?php

namespace App\Http\Controllers;

use App\Http\Resources\Review\ReviewCollection;
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
        if($r->hasFile('logo')){
            $review['img'] = StorageController::saveImage('review',$review->id,'logo',$r->file('logo'));
        }
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
     * @return Review|Review[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        $review =  Review::find($id);
        $review->document;
        return $review;
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
        if($r->hasFile('logo')){
            $review['img'] = StorageController::saveImage('review',$review->id,'logo',$r->file('logo'));
        }
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
        if(isset($review['img'])){
            StorageController::clearDir('review', $review->id);
        }
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
