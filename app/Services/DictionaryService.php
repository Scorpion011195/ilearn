<?php

namespace App\Services;

use App\Model\Dictionary;
use App\Repositories\DictionaryRepository;

class DictionaryService extends BaseService implements DictionaryRepository
{
    public function __construct(Dictionary $model)
    {
        parent::__construct($model);
    }

    public function search($phrase, $source, $dest)
    {

    }

}
