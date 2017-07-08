<?php

namespace App\Http\Controllers;

use App\Repositories\SettingRepository;
use Illuminate\Http\Request;
use App\Models\Setting;
use Auth;
use app\Controller\userController;
use Session;
class SettingController extends Controller
{

    public function getSetting()
    {
        $id=Auth::user()->id_user;
        $setting = Setting::where('id_user',$id)->first();
        $time = $setting->time_to_remind;
        $idReminder  = $setting->id_reminder;
        $typeReminder = MyConstant::TYPE_REMINDERS[$idReminder];
        $status = $setting->status;
        

        // Get All type time
        $arrTypeTime = MyConstant::TYPE_TIME_REMINDERS;
        $arrTypeReminder = MyConstant::TYPE_REMINDERS;

        return view('frontend.pages.settings',['arrTypeReminder'=>$arrTypeReminder,'typeTime' => $arrTypeTime,'time' => $time, 'typeReminder' => $typeReminder, 'status' =>$status]);
    }

    public function updateSetting(Request $request)
    {
        $id=Auth::user()->id_user;

        // Input
        $time = $request->timeRemind;
        $typeRemind = $request->typeRemind;
        $status = $request->notificationBtn;

        echo $time;
        echo "<br>";
        echo $typeRemind;
        echo "<br>";
        echo $status;
        die();
        // Update
        $dataUpdate = ['time_to_remind' => $time, 'id_reminder' => $typeRemind, 'status' => $status];
        Setting::where('id_user',$id)->update($dataUpdate);
        
        // $response = ["data"=>true];
        // return json_encode($response);
    }
}
