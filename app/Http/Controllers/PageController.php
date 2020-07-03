<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Page[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Page::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $r)
    {
        $page = new Page();
        $page->fill(request($page->getFillable()));
        $page->saveOrFail();
        return response()->json(
            array(
                'status' => true
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $r, $id)
    {
        $page = Page::find($id);
        $page->fill($r->all($page->getFillable()));
        try {
            $page->saveOrFail();
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
        $page = Page::find($id);
        try {
            $page->delete();
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
