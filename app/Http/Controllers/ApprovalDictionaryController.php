<?php

namespace App\Http\Controllers;

use App\Repositories\ApprovalDictionaryRepository;
use Illuminate\Http\Request;

class ApprovalDictionaryController extends Controller implements BaseController
{
    public function __construct(ApprovalDictionaryRepository $approvalDictionary)
    {
        $this->approvalDictionary = $approvalDictionary;
    }

    //
    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getByID($id)
    {
        // TODO: Implement getByID() method.
    }

    public function find(Request $request)
    {
        // TODO: Implement find() method.
    }

    public function update(Request $request)
    {
        // TODO: Implement update() method.
    }

    public function store(Request $request)
    {
        // TODO: Implement store() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
