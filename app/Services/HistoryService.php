<?php
/**
 * Created by PhpStorm.
 * User: silverhawk
 * Date: 08/06/2017
 * Time: 10:48
 */

namespace App\Services;

use App\Models\History;
use App\Repositories\HistoryRepository;
use DB;

class HistoryService extends BaseService implements HistoryRepository
{

    public function __construct(History $model)
    {
        $this->model = $model;
    }

    // function getHistory($idUser){
    //     $column = 'id_history';
    //     return DB::table('historys')->where($column, $idUser)->get();
    // }
}
