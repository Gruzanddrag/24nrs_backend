<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Http\Resources\Entry\Entry as EntryResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\StorageController;

class EntryController extends Controller
{

    /**
     * returns all entries
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return EntryResource::collection(Entry::all());
    }

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
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function store(Request $r)
    {
        $entry = new Entry();
        $entry->fill(request($entry->getFillable()));
        $entry['date'] = date('Y-m-d');
        $entry->saveOrFail();
        $preview = $r->file('preview');
        if(isset($preview)){
            $entry['preview'] = StorageController::saveImage(request('category'), $entry->id, 'prev', $preview);
        }
        $imgDes = $r->file('imgDes');
        if(isset($imgDes)){
            $entry['image_des'] = StorageController::saveImage(request('category'), $entry->id, 'desc', $imgDes);
        }
        $imgMob = $r->file('imgMob');
        if(isset($imgMob)){
            $entry['image_mob'] = StorageController::saveImage(request('category'), $entry->id, 'mob', $imgMob);
        }
        $entry->saveOrFail();
        return response()->json(
            array(
                'status' => true
            )
        );
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return response()->json(Entry::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $r
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $r, $id)
    {
        $entry = Entry::find($id);
        If(isset($entry)) {
            $entry->fill(request($entry->getFillable()));
            $preview = $r->file('preview');
            if(isset($preview)){
                $entry['preview'] = StorageController::saveImage(request('category'), $id, 'prev', $preview);
            }
            $imgDes = $r->file('imgDes');
            if(isset($imgDes)){
                $entry['image_des'] = StorageController::saveImage(request('category'), $id, 'desc', $imgDes);
            }
            $imgMob = $r->file('imgMob');
            if(isset($imgMob)){
                $entry['image_mob'] = StorageController::saveImage(request('category'), $id, 'mob', $imgMob);
            }
            $entry->saveOrFail();
        }
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $e = Entry::find($id);
        StorageController::clearDir($e['category'],$id);
        $e->delete();
        return response()->json(
            array(
                'status' => true
            )
        );
    }

    /**
     * Store preview image
     * @param $file
     */
    private function storePreview($file) {

    }

    /**
     * Store main image
     * @param $file
     */
    private function storeMainPage($file){

    }
}
