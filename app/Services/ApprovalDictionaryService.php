<?php
/**
 * Created by PhpStorm.
 * User: silverhawk
 * Date: 08/06/2017
 * Time: 11:35
 */

namespace App\Services;


use App\ApprovalDictionary;
use App\Repositories\ApprovalDictionaryRepository;

class ApprovalDictionaryService extends BaseService implements ApprovalDictionaryRepository
{

    public function __construct(ApprovalDictionary $model)
    {
        parent::__construct($model);
    }

    public function find(array $attributes)
    {
        // TODO: Implement find() method.
    }
}