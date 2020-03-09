<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Console\Presets\None;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;
use App\Models\File;

class StorageController extends Controller
{
    /**
     * @var string preview for word
     */
    private $SRS_FOR_WORD_PREVIEW = '/public/assets/img/svg/word.svg';
    /**
     * @var string preview for pdf
     */
    private $SRS_FOR_PDF_PREVIEW = '/public/assets/img/svg/pdf.svg';

    public function index(){
        return File::withoutGlobalScope('view')->get();
    }
    /**
     * @param Request $r
     * @param $tag
     * @return string
     * @throws \Throwable
     */
    public function store(Request $r) {
        if($r->hasFile('file')) {
            $f = new File();
            $file = $r->file('file');
            list($name, $ext) = explode('.', $file->getClientOriginalName());
            $path = self::saveFile($file, $name, $ext);
            if($file->getClientOriginalExtension() === 'pdf'){
                $f->preview = $this->SRS_FOR_PDF_PREVIEW;
            } else if(preg_match('/doc.*/',$file->getClientOriginalExtension())){
                $f->preview = $this->SRS_FOR_WORD_PREVIEW;
            } else {
                $f->preview = $path;
            }
            $f->ext = $ext;
            $f->name = $name;
            $f->file = $path;
            $f->saveOrFail();
            return $f;
        } else {
            return response()->json(array(
                'status' => false
            ));
        }
    }

    static function saveFile($file, $name, $ext){
        $pathToDir = 'public/'.
            date('Y') . '/' .
            date('m') . '/' .
            date('d');
        $path = Storage::putFileAs($pathToDir, $file, self::translit($name) . '-' . date('Y-m-d').'.'.$ext);
        $path = preg_replace('/^public\//','/storage/',$path);
        return $path;
    }

    /**
     * Удаляет файл
     * @param $category
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy($id){
        $f = File::find($id);
        $path = $f->file;
        $path = preg_replace('/^\/storage\//','/public/',$path);
        try {
            Storage::delete($path);
        } catch (\Exception $e){
            return response()->json(array(
                'status' => false,
                'msg' => $e
            ));
        }
        $f->delete();
        return response()->json(array(
            'status' => true
        ));
    }

    /**
     * Показывает 1 файл
     * @param $category
     * @param $id
     * @return File|File[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     * @throws \Exception
     */
    public function show($id){
        return File::withoutGlobalScope('view')->find($id);
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

