<?php

namespace App\Http\Controllers;

use App\Http\Resources\Entry\EntryCollection;
use App\Http\Resources\Entry\EntryPage;
use App\Models\Page;
use App\Models\PageEntry;
use Illuminate\Http\Request;

class PageEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($id)
    {
        $page = Page::find($id);
        return response()->json(array(
            'data' => [
                'page' => $page,
                'entry' => EntryPage::collection($page->entries)
            ]
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, $page_id, $entry_id)
    {
        $pageEntry = new PageEntry();
        $pageEntry->entry_id = $entry_id;
        $pageEntry->page_id = $page_id;
        try {
            $pageEntry->saveOrFail();
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
        $pageEntry = PageEntry::find($id);
        try {
            $pageEntry->delete();
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
