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
     * @var string preview for word
     */
    private $srcWordDocPreview = '/public/assets/img/svg/word.svg';
    /**
     * @var string preview for pdf
     */
    private $srcPdfDocPreview = '/public/assets/img/svg/pdf.svg';

    /**
     * Display a listing of the resource.
     *
     * @return DocumentCollection
     */
    public function index()
    {
        return new DocumentCollection(Document::all());
//        return Document::paginate(3);
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
        $doc['preview'] = $request['extension'] == 'word' ? $this->srcWordDocPreview : $this->srcPdfDocPreview;
        if($request->hasFile('documentFile')){
            $doc['document'] = StorageController::saveDocument($request->file('documentFile'), $doc->title);
        } else {
            return response()->json(
                array(
                    'status' => false
                )
            );
        }
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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Document::find($id);
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
        $doc['date'] = date('Y-m-d');
        $doc['preview'] = $request['extension'] == 'word' ? $this->srcWordDocPreview : $this->srcPdfDocPreview;
        if($request->hasFile('documentFile')){
            StorageController::clearDoc($doc['document']);
            $doc['document'] = StorageController::saveDocument($request->file('documentFile'), $doc['title']);
        }
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
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $d = Document::find($id);
        StorageController::clearDoc($d['document']);
        $d->delete();
        return response()->json(
            array(
                'status' => true
            )
        );
    }
}
