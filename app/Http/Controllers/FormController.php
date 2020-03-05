<?php

namespace App\Http\Controllers;

use App\Models\ContactUsForm;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     *  handle a contact us form
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     * @throws \Throwable
     */
    public function handleContactUsForm(Request $request){
        $ip = $request->ip();
        $form = new ContactUsForm();
        $form->fill($request->all());
        $form->ip = $ip;
        $form->date = date('d.m.Y');
        $form->time = date('H:i:s');
        $form->region = $this->occurrenceRegion($ip);
        $form->town = $this->occurrenceCity($ip);
        \Log::debug($form);
        try {
            $form->saveOrFail();
            return view('pages.ty');
        } catch (\Exception $e) {
            return response()->json(array(
                'status' => false,
                'msg' => $e
            ));
        }
    }

    /**
     * find a city by IP
     * @param string $to
     * @param $ip - ip from request
     * @return bool|false|\SimpleXMLElement|string
     */
    private function occurrenceCity($ip, $to = 'utf-8'){
        $xml =  simplexml_load_file('http://ipgeobase.ru:7020/geo?ip='.$ip);
        if($xml->ip->message){
            if( $to == 'utf-8' ){
                return $xml->ip->message;
            } else {
                if( function_exists('iconv')) return iconv( "UTF-8", $to . "//IGNORE",$xml->ip->message);
                else return "The library iconv is not supported by your server";
            }

        }else{
            if($to == 'utf-8'){
                return $xml->ip->city;
            }else{
                if(function_exists( 'iconv' ))return iconv( "UTF-8", $to . "//IGNORE",$xml->ip->city);
                else return "The library iconv is not supported by your server";
            }
        }
    }

    /**
     * find a region by IP
     * @param string $to
     * @param $ip - ip from request
     * @return bool|false|\SimpleXMLElement|string
     */
    private function occurrenceRegion($ip, $to = 'utf-8'){
        $xml =  simplexml_load_file('http://ipgeobase.ru:7020/geo?ip='.$ip);
        if($xml->ip->message){
            if( $to == 'utf-8' ){
                return $xml->ip->message;}else
            {
                if( function_exists('iconv')) return iconv( "UTF-8", $to . "//IGNORE",$xml->ip->message);
                else return "The library iconv is not supported by your server";
            }

        }else{
            if($to == 'utf-8'){
                return $xml->ip->region;
            }else{
                if(function_exists( 'iconv' ))return iconv( "UTF-8", $to . "//IGNORE",$xml->ip->region);
                else return "The library iconv is not supported by your server";
            }
        }
    }
}
