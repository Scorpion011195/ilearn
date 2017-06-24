<?php

namespace App\Services;

use App\Repositories\NotificationRepository;

class NotificationService implements NotificationRepository
{
    protected $id;
    protected $notifications;
    protected $settings;

    public function __construct($id, array $notifications, array $settings)
    {
        $this->$id = $id;
        $this->notifications = $notifications;
        $this->$settings = $settings;
    }

    public function setNotifications(array $notifications)
    {
        $this->notifications = $notifications;
    }

    public function setSettings(array $settings)
    {
        $this->settings = $settings;
    }

    public function setID($id)
    {
        $this->id = $id;
    }

    public function start() {

    }
}
