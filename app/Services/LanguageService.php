<?php

namespace App\Services;

use App\Repositories\LanguageRepository;
use App\Models\Language;

class LanguageService extends BaseService implements LanguageRepository{

    public function __construct(Language $model)
    {
        $this->model = $model;
    }

    public function find(array $attributes)
    {

    }

    public function findWord($langueInput, $langueOutput, $inputText) {
        //get ID maping :
        $lagInfor = \DB::table($langueInput)->select('id_mapping')->where('word', 'like', '%word":"'.$inputText.'"}')->get();
        if(!isset($lagInfor[0])) {
            return false;
        }
        else {

            //get Word :
            return \DB::table($langueOutput)->select('word', 'listen', 'explain')->where('id_mapping', '=', $lagInfor[0]->id_mapping)->get();
        }
    }

}
