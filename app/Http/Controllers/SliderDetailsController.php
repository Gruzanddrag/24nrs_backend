<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\SliderDetail;
use Illuminate\Http\Request;

class SliderDetailsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $slider = Slider::find($request->get('slider_id'));
        $detail = new SliderDetail();
        $detail->fill($request->all($detail->getFillable()));
        $slider->details()->save($detail);
        return response()->json([
            'status' => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $detail = SliderDetail::find($id);
        $detail->fill($request->all($detail->getFillable()));
        try {
            $detail->saveOrFail();
            return response()->json([
                'status' => true
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'msg' => $exception
            ]);
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
        $detail = SliderDetail::find($id);
        try {
            $detail->delete();
            return response()->json([
                'status' => true
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'msg' => $exception
            ]);
        }
    }
}
