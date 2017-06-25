<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HistoryService;
use App\Models\History;
use App\Services\UserService;
use App\Models\User;
use App\Services\SubmitionService;
use App\Models\Submition;
use App\Http\Controllers\MyConstant;

class StatisticManagementController extends Controller
{

    // Lấy key loại từ của một bảng để chuyển đổi sang loại từ của bảng ngôn ngữ khác
    function getKeyFromValue($tableFrom, $value){
        switch($tableFrom){
            case 'english':
                $key = array_search($value, MyConstant::TYPE_OF_WORD_ENGLISH);
                break;
            case 'vietnamese':
                $key = array_search($value, MyConstant::TYPE_OF_WORD_VIETNAMESE);
                break;
            case 'japanese':
                $key = array_search($value, MyConstant::TYPE_OF_WORD_JAPANESE);
        }
        return $key;
    }

    // Từ key chuyển sang loại từ tương ứng của bảng ngôn ngữ khác
    function getValueFromKey($tableTo, $key){
        switch($tableTo){
            case 'english':
                $value = MyConstant::TYPE_OF_WORD_ENGLISH[$key];
                break;
            case 'vietnamese':
                $value = MyConstant::TYPE_OF_WORD_VIETNAMESE[$key];
                break;
            case 'japanese':
                $value = MyConstant::TYPE_OF_WORD_JAPANESE[$key];
        }
        return $value;
    }

    /*Get history of user
    Called by function statisticOneUser() */
    function getHistoryOfUser($idUser){
        $historyService = new HistoryService(new History);

        $column = 'id_history';
        $objHistory = $historyService->getByColumn($column, $idUser);

        $content = $objHistory->content;

        $arrContent = json_decode($content);

        return $arrContent;
    }

    /* Thống kê từ vựng của 1 user
    So sánh các từ trong lịch sử của 1 user đã có trong mảng thống kê chưa
    Nếu có rồi thì tăng chỉ số lên 1
    Chưa có thì thêm từ đó vào mảng thống kê
    Called by function statisticAllUser() */
    function statisticOneUser($idUser){
        $lengthStatistic = sizeof(MyConstant::$arr_statistic_word);

        $arrContent = $this->getHistoryOfUser($idUser);

        foreach ($arrContent as $rowOfContentUser) {
            $i=0;
            foreach(MyConstant::$arr_statistic_word as $rowOfStatistic){
                // Nếu từ đã có -> Tăng quanlity lên 1
                if($rowOfContentUser->from_text==$rowOfStatistic['from_text']&&$rowOfContentUser->to_text==$rowOfStatistic['to_text']){
                    MyConstant::$arr_statistic_word[$i]['quanlity']++;
                    break;
                }

                $i++;

                // Nếu từ chưa có -> Thêm từ vào mảng và gán quanlity=1
                if($i == $lengthStatistic){
                    $stt = sizeof(MyConstant::$arr_statistic_word);
                    $stt++;

                    // Kiểm tra từ đã có trong database chưa?
                    $tableFrom = $rowOfContentUser->from;
                    $tableTo = $rowOfContentUser->to;
                    $column = 'word';
                    $wordFrom = $rowOfContentUser->from_text;
                    $keyType = $this->getKeyFromValue($tableTo, $rowOfContentUser->type_to);
                    $typeFrom = $this->getValueFromKey($tableFrom, $keyType);
                    $isAdded = DictionaryManagementController::checkWordExist($tableFrom, $column, $wordFrom, $typeFrom);
                    if($isAdded){
                        $status = 'added';
                    }
                    else{
                        $status = 'waiting';
                    }

                    // Thêm từ mới vào mảng
                    $pushMe = ['STT'=>$stt,'from'=>$rowOfContentUser->from,'to'=>$rowOfContentUser->to,'from_text'=>$rowOfContentUser->from_text,'to_text'=>$rowOfContentUser->to_text,'quanlity'=>1,'type_from'=>$typeFrom,'status'=> $status];

                    array_push(MyConstant::$arr_statistic_word, $pushMe);
                }
            }
        }
    }

    // Thống kê từ vựng của tất cả user
    function statisticAllUser(){
        $userService = new UserService(new User);
        $users = $userService->getAll();

        $countUsers = $users->count();

        // Reset submitions table
        $submitionService = new SubmitionService(new Submition);
        $submitionService->reset();

        // Thống kê -> kết quả lưu vào array MyConstant::$arr_statistic_word
        for($i=0; $i<$countUsers; $i++){
            $idUser = $users[$i]->id_user;

            $this->statisticOneUser($idUser);
        }

        // Đưa mảng đã thống kê vào submitions table
        foreach (MyConstant::$arr_statistic_word as $row) {
            if($row['quanlity']==0){
                continue;
            }
            $submitionService->create($row);
        }
    }

    // Hiển thị kết quả thống kê
    function displayStatisticalResult(){
        $noOfSubmitions = Submition::count();
        $noOfPages = 5;
        $submitions = Submition::orderBy('quanlity', 'DESC')->paginate($noOfPages);

        $param = ['submitions'=>$submitions,'noOfSubmitions'=>$noOfSubmitions];
        return view('backend.dict.collect', $param);
    }

    // Hiển thị kết quả theo điều kiện đã có hay chưa có trong từ điển
    function displayStatisticalResultByCondition(Request $request){
        // Input
        $condition = $request->_condition;

        $noOfSubmitions = Submition::count();
        $noOfPages = 5;

        switch ($condition) {
            case 'Tất cả':
                $submitions = Submition::orderBy('quanlity', 'DESC')->paginate($noOfPages);
                break;
            case 'added':
                $submitions = Submition::where('status','added')->orderBy('quanlity', 'DESC')->paginate($noOfPages);
                break;
            case 'waiting':
                $submitions = Submition::where('status','waiting')->orderBy('quanlity', 'DESC')->paginate($noOfPages);
        }
        $param = ['submitions'=>$submitions,'noOfSubmitions'=>$noOfSubmitions];
        return view('backend.dict.collect', $param);
    }
}
