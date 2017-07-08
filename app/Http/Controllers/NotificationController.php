<?php

namespace App\Http\Controllers;

use App\Repositories\NotificationRepository;
use Illuminate\Http\Request;
use auth;
use App\Services\HistoryService;
use App\Models\History;
use App\Services\SettingService;
use App\Models\Setting;

class NotificationController extends Controller
{
    // Get time to push
    function getTimeNotification(){
        $settingService = new SettingService(new Setting);

        $id=Auth::user()->id_user;

        $setting = $settingService->getByColumn('id_user', $id);
        $timeReminder = $setting->time_to_remind;

        // Change minutes to miliseconds
        $time = $timeReminder*60*1000;

        $dataResponse = ["code"=>true,"time"=>$time];
        return json_encode($dataResponse);
    }

    // Get random word to push
    function getWordNotification(){
        $historyService =  new HistoryService(new History);
        $settingService = new SettingService(new Setting);

        $id=Auth::user()->id_user;

        // Get Historys
        $history = $historyService->getByColumn('id_history', $id);
        $strContentHistory = $history->content;
        $arrContentHistory = json_decode($strContentHistory);

        // Get words to push
        $arrContentPush = array();
        foreach ($arrContentHistory as $row) {
            if($row->notification=="T"){
                array_push($arrContentPush, $row);
            }
        }

        $strContentPush = json_encode($arrContentPush, JSON_UNESCAPED_UNICODE);

        // Get Settings
        $setting = $settingService->getByColumn('id_user', $id);
        $typeReminder = MyConstant::TYPE_REMINDERS[$setting->id_reminder];

        $dataResponse = ["code"=>true,"content"=>$strContentHistory,"type"=>$typeReminder];
        return json_encode($dataResponse);
    }
}
