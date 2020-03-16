<?php

namespace App\Http\Controllers;

use App\Models\MenuLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return MenuLink[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return MenuLink::all();
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
        $links = $request->all();
        DB::beginTransaction();
        MenuLink::truncate();
        try {
            foreach ($links as $position => $link){
                $newMenuLink = new MenuLink();
                $newMenuLink->fill($link);
                $newMenuLink->position = $position;
                $newMenuLink->save();
            }
            DB::commit();
        } catch (\Exception $e){
            DB::rollBack();
            return response()->json(array(
                'status' => false,
                'msg' => $e
            ));
        }
        return response()->json(array(
            'status' => true
        ));
    }
}
