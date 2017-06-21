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

class HistoryService extends BaseService implements HistoryRepository
{

    public function __construct(History $model)
    {
        $this->model = $model;
    }


    public function find(array $attributes)
    {
        // TODO: Implement find() method.
    }

    public function getSettings($id)
    {
        // TODO: Implement getSettings() method.
    }

    public function pushNotification($id)
    {
        // TODO: Implement pushNotification() method.
    }

    public function setNotification($id, $index, $flag)
    {
        // TODO: Implement setNotification() method.
    }

    public function deleteNotification($id, $index)
    {
        // TODO: Implement deleteNotification() method.
    }

    public function getAllNotification($id)
    {
        // TODO: Implement getAllNotification() method.
    }
}