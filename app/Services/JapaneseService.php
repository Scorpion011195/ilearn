<?php

namespace App\Services;

use App\Repositories\JapaneseRepository;
use App\Models\Japanese;
use DB;

class JapaneseService extends BaseService implements JapaneseRepository{

    public function __construct(Japanese $model)
    {
        $this->model = $model;
    }

    public function getMaxIdMapping(){
        return DB::table('japanese')->max('id_mapping');
    }

}
