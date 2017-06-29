<?php
/**
 * Created by PhpStorm.
 * User: silverhawk
 * Date: 08/06/2017
 * Time: 11:40
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\HistoryUpdateRequest;

interface BaseController
{
    public function getAll();

    public function getByID($id);

    public function find(Request $request);

    public function update(HistoryUpdateRequest $request);

    public function store(Request $request);

    public function delete($id);
}