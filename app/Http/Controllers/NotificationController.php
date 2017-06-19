<?php

namespace App\Http\Controllers;

use App\Repositories\NotificationRepository;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct(NotificationRepository $notification)
    {
        $this->notification = $notification;
    }

    public function start() {

    }
}
