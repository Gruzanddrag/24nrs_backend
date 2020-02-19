<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Slider[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Slider::all();
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
        $slider = new Slider();
        $slider->fill($request->all($slider->getFillable()));
        $slider->saveOrFail();
        if($request->hasFile('img')){
            $file = $request->file('img');
            list($name, $ext) = explode('.', $file->getClientOriginalName());
            $slider['img'] = StorageController::saveFile($file, $name, $ext);
        }
        $slider->saveOrFail();
        try {
            $slider->saveOrFail();
            return response()->json(array('status'=>true));
        } catch (\Exception $e) {
            return response()->json(array(
                'status' => true,
                'msg' => $e
            ));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Slider|Slider[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        $slider = Slider::where('id','=',$id)->with('details.imgFile');
        return $slider->get();
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
        $slider = Slider::find($id);
        $slider->fill(request($slider->getFillable()));
        try {
            if($request->hasFile('img')){
                $file = $request->file('img');
                list($name, $ext) = explode('.', $file->getClientOriginalName());
                $slider['img'] = StorageController::saveFile($file, $name, $ext);
            }
            $slider->saveOrFail();
            return response()->json(array('status'=>true));
        } catch (\Exception $e) {
            return response()->json(array(
                'status' => true,
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
        try {
            $slider = Slider::find($id);
            $slider->delete();
            return response()->json(array('status'=>true));
        } catch (\Exception $e) {
            return response()->json(array(
                'status' => true,
                'msg' => $e
            ));
        }
    }
}
