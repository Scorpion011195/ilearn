<?php
/**
 * Created by PhpStorm.
 * User: silverhawk
 * Date: 08/06/2017
 * Time: 10:39
 */

namespace App\Repositories;


use App\Services\BaseService;

interface HistoryRepository extends BaseRepository
{
    public function getSettings($id);

    public function pushNotification($id);

    public function setNotification($id, $index, $flag);

    public function deleteNotification($id, $index);

    public function getAllNotification($id);
}