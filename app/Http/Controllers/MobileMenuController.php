<?php

namespace App\Http\Controllers;

use App\Models\MobileMenuLink;
use App\Http\Resources\MobileMenuLink as MobileLinkResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MobileMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return MobileLinkResource::collection(MobileMenuLink::query()->whereNull('parent_id')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * @throws \Throwable
     */
    public function store(Request $request)
    {
        $links = $request->all();
        \Log::debug($links);
//        DB::beginTransaction();
        MobileMenuLink::truncate();
        try {
            foreach ($links as $position => $link){
                $newMobileMenuLink = new MobileMenuLink();
                $newMobileMenuLink->fill($link);
                $newMobileMenuLink->position = $position;
                $newMobileMenuLink->saveOrFail();
                if(isset($link['children'])){
                    foreach ($link['children'] as $pos => $child) {
                        $newChildLink = new MobileMenuLink();
                        $newChildLink->fill($child);
                        $newChildLink->position = $pos;
                        $newChildLink->parent_id = $newMobileMenuLink->id;
                        $newChildLink->saveOrFail();
                    }
                }
            }
//            DB::commit();
        } catch (\Exception $e){
//            DB::rollBack();
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
