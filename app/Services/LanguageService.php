<?php

namespace App\Services;

use App\Repositories\LanguageRepository;
use App\Models\Language;

class LanguageService extends BaseService implements LanguageRepository{

    public function __construct(Language $model)
    {
        $this->model = $model;
    }
    public function findWord($langueInput, $langueOutput, $inputText) {
        //get ID maping :
        $lagInfor = \DB::table($langueInput)->select('id_mapping')->where('word', 'like', '%word":"'.$inputText.'"}')->get();

        $lagMapping = array();

        for($i=0; $i<count($lagInfor); $i++ )
        {
             if(!isset($lagInfor[$i])) {
                 return false;
             }
             else {
            //get Word :
            $lagResult = \DB::table($langueOutput)->select('id','word', 'listen', 'explain')->where('id_mapping', '=', $lagInfor[$i]->id_mapping)->orderBy('word','asc')->get();
            array_push($lagMapping,  $lagResult);
            
         }
        } 
        return $lagMapping;
    }
    public function findWordSelf($langueInput, $inputText)
    {
        return \DB::table($langueInput)->where('word', 'like', '%word":"'.$inputText.'"}')->get();
    }
}
