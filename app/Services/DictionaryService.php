<?php
/**
 * Created by PhpStorm.
 * User: silverhawk
 * Date: 08/06/2017
 * Time: 09:28
 */

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

    public function find(array $attributes)
    {

    }
}