<?php

namespace App\Http\Controllers;

use App\Models\EntryTheme;
use Illuminate\Http\Request;

class EntryThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return EntryTheme[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return EntryTheme::all();
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
        $theme = new EntryTheme();
        $theme->fill($request->all());
        try {
            $theme->saveOrFail();
            return response()->json(array(
                'status' => true,
                'id' => $theme->id
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
        $theme = EntryTheme::find($id);
        $theme->fill($request->all());
        try {
            $theme->saveOrFail();
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
        $theme = EntryTheme::find($id);
        try {
            $theme->delete($id);
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
