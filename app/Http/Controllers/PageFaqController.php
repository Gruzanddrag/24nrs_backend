<?php

namespace App\Http\Controllers;

use App\Http\Resources\FAQ\FaqPage;
use App\Models\Page;
use App\Models\PageFaq;
use Illuminate\Http\Request;

class PageFaqController extends Controller
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
                'faq' => FaqPage::collection($page->faq)
            ]
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, $page_id, $cat_id)
    {
        $pageFaq = new PageFaq();
        $pageFaq->faq_category_id = $cat_id;
        $pageFaq->page_id = $page_id;
        try {
            $pageFaq->saveOrFail();
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
        $pageFaq = PageFaq::find($id);
        try {
            $pageFaq->delete();
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
