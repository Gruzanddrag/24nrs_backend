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
        $imgMob = $r->file('imgMob');
        if(isset($imgMob)){
            list($name, $ext) = explode('.',$imgMob->getClientOriginalName());
            $entry['image_mobile'] = StorageController::saveFile($imgMob, $name, $ext);
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
        $e = Entry::find($id);
        $e->desktopImg;
        $e->previewImg;
        return response()->json($e);
    }

    /**
     * Update info about entry
     *
     * @param Request $r
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function edit(Request $r, $id)
    {
        $entry = Entry::find($id);
        If(isset($entry)) {
            $entry->fill(request($entry->getFillable()));
            $imgMob = $r->file('imgMob');
            if(isset($imgMob)){
                $entry['image_mob'] = StorageController::saveFile();
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
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $e = Entry::find($id);
        $e->delete();
        return response()->json(
            array(
                'status' => true
            )
        );
    }
}
