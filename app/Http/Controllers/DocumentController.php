<?php

namespace App\Http\Controllers;

use App\Http\Resources\Document\DocumentCollection;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\StorageController;
use Illuminate\Support\Facades\Log;

class DocumentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return DocumentCollection
     */
    public function index()
    {
        return new DocumentCollection(Document::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     * @throws \Throwable
     */
    public function store(Request $request)
    {
        $doc = new Document();
        $doc->fill(request($doc->getFillable()));
        $doc['date'] = date('Y-m-d');
        $doc->saveOrFail();
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
     * @return Document|Document[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        $doc = Document::find($id);
        $doc->documentFile;
        return $doc;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function edit($id, Request $request)
    {
        $doc = Document::find($id);
        $doc->fill(request($doc->getFillable()));
        $doc->saveOrFail();
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
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $d = Document::find($id);
        $d->delete();
        return response()->json(
            array(
                'status' => true
            )
        );
    }
}
