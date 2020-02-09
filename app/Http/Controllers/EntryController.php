<?php

namespace App\Http\Controllers;

use App\Http\Resources\Entry\EntryCollection;
use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\StorageController;

class EntryController extends Controller
{

    /**
     * returns all entries
     * @return EntryCollection
     */
    public function index()
    {
        return new EntryCollection(Entry::all());
    }

    /**
     * Store a newly created entry
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
     * Update info about entry
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
}
