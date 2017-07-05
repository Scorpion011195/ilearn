<?php

namespace App\Services;

use App\Models\Setting;
use App\Repositories\SettingRepository;
use DB;

class SettingService extends BaseService implements SettingRepository
{

    public function __construct(Setting $model)
    {
        $this->model = $model;
    }
}
