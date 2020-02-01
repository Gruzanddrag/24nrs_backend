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
     * Чистит всю инфу о статье (превьшки и т.д.)
     * @param $category
     * @param $id
     * @return bool
     */
    static function clearDir($category, $id){
        try {
            Storage::deleteDirectory('public/' . $category . '/' . $id);
            return true;
        } catch (\Exception $e) {
            \Log::error($e);
            return false;
        }
    }
}

