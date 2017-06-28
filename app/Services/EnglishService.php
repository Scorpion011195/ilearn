<?php

namespace App\Services;

use App\Repositories\EnglishRepository;
use App\Models\English;
use DB;

class EnglishService extends BaseService implements EnglishRepository{

    public function __construct(English $model)
    {
        $this->model = $model;
    }

    public function findWord($column, $word)
    {
        return DB::table('english')->where($column, 'like', '%word":"'.$word.'"}')->get();
    }

    public function findWordWithType($column, $word, $type)
    {
        return DB::table('english')->where($column, 'like', '%'.$type.'%'.$word.'"}')->first();
    }

    public function getMaxIdMapping(){
        return DB::table('english')->max('id_mapping');
    }

    public function getAllByIdMappingOrderById($column, $value){
        return $this->model->where($column, $value)->orderBy('id','asc')->get();
    }

}
