<?php

namespace App\Repositories;

interface NotificationRepository
{
    public function __construct($id, array $notifications, array $settings);

    public function setNotifications(array $notifications);

    public function setSettings(array $settings);

    public function setID($id);

    public function start();

}
