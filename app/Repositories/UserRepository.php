<?php
/**
 * Created by PhpStorm.
 * User: silverhawk
 * Date: 08/06/2017
 * Time: 08:30
 */
namespace App\Repositories;

interface UserRepository extends BaseRepository {

    public function setStatus($id, $id_status);



}
