<?php

namespace App\Http\Controllers;

use App\Models\ContactUsForm;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     *  handle a contact us form
     * @param Request $request
     */
    public function handleContactUsForm(Request $request){
        $form = new ContactUsForm();
        $form->fill($request->all());
        \Log::debug($this->occurrenceCity('195.209.246.243'));
        \Log::debug($this->occurrenceRegion('195.209.246.243'));
        return 'adadwa';
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
