<?php

namespace App\Http\Controllers;

use App\Repositories\HistoryRepository;
use App\Repositories\NotificationRepository;
use Illuminate\Http\Request;

class HistoryController extends Controller implements  BaseController
{

    public function __construct(HistoryRepository $history)
    {
        $this->history = $history;
    }

    //
    public function getAll()
    {
        // TODO: Implement getAll() method.$h
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

    public function getNotifications($id) {

    }

    public function setNotifications($id, Request $request) {

    }

    public function getSettings($id) {

    }

    public function setSettings($id, Request $request) {

    }
}
