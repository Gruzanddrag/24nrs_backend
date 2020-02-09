<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Console\Presets\None;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;

class StorageController extends Controller
{
    /**
     * Метод для сохранения картинки
     * @param $category
     * @param $id
     * @param $imgDesc
     * @param $img
     * @return bool
     */
    static function saveImage($category, $id, $imgDesc, $img){
        $pathToDir = 'public/'. $category . "/" . $id . '/' . $imgDesc;
        if (!file_exists($pathToDir)) {
            Storage::makeDirectory($pathToDir);
        }
        $path = Storage::putFileAs($pathToDir, $img, $imgDesc.'.jpg');
        return Storage::url($path);
    }

    /**
     * @param $category
     * @param $id
     * @param $imgDesc
     * @param $img
     * @return string
     */
    static function saveDocument($doc, $title) {
        $pathToDir = 'public/documents/'.
            date('Y') . '/' .
            date('m') . '/' .
            date('d') ;
        if (!file_exists($pathToDir)) {
            Storage::makeDirectory($pathToDir);
        }
        $path = Storage::putFileAs($pathToDir, $doc, self::translit($title).date('Y-m-d').'.'.$doc->extension());
        return Storage::url($path);
    }

    /**
     * Чистит всю инфу о статье (превьюшки и т.д.)
     * @param $category
     * @param $id
     * @return bool
     */
    static function clearDir($category, $id){
        try {
            Storage::deleteDirectory('public/' . $category . '/' . $id);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Удаляет документ
     * @param $category
     * @param $id
     * @return bool
     */
    static function clearFile($path){
        try {
            $path = preg_replace('/^\/storage\//','/public/',$path);
            \Log::debug($path);
            Storage::delete($path);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Переводит строку в транслит
     * @param $s
     * @return bool|false|string|null
     */
    static function translit($s) {
        $s = (string) $s;
        $s = strip_tags($s);
        $s = str_replace(array("\n", "\r"), " ", $s);
        $s = preg_replace("/\s+/", ' ', $s);
        $s = trim($s);
        $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s);
        $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
        $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s);
        $s = str_replace(" ", "-", $s);
        return $s;
    }

}

