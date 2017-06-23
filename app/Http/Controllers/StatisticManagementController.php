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
    // Just test
    function testInsertArrayToHistory(){
        $arr1 = ["STT"=>1,"from"=>"english","to"=>"vietnamese","from_text"=>"Hello","to_text"=>"Xin chào","from_explain"=>"Not thing","to_explain"=>"Ko co gi","notification"=>"F"];
        $arr2 = ["STT"=>2,"from"=>"japanese","to"=>"vietnamese","from_text"=>"こんにちは","to_text"=>"Xin chào","from_explain"=>"Not thing","to_explain"=>"Ko co gi","notification"=>"F"];
        $arr3 = ["STT"=>3,"from"=>"english","to"=>"japanese","from_text"=>"Hello","to_text"=>"こんにちは","from_explain"=>"Not thing","to_explain"=>"Ko co gi","notification"=>"F"];

        $arrParent = array();
        array_push($arrParent, $arr1, $arr2, $arr3);

        $jsonparent = json_encode($arrParent);

        $historyService = new HistoryService(new History);
        $historyService->create(['id_history'=>4,'content'=>$jsonparent]);

        echo "Da them thanh cong!";
    }


    /*Get history of user
    Called by function incStatisticWord() */
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

                    $pushMe = ['STT'=>$stt,'from'=>$rowOfContentUser->from,'to'=>$rowOfContentUser->to,'from_text'=>$rowOfContentUser->from_text,'to_text'=>$rowOfContentUser->to_text,'quanlity'=>1,'status'=>'waiting'];

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
            $submitionService->create($row);
        }

        // Hiển thị kết quả thống kê
        $noOfSubmitions = Submition::count();
        $noOfPages = 5;
        $submitions = Submition::paginate($noOfPages);

        $param = ['submitions'=>$submitions,'noOfSubmitions'=>$noOfSubmitions];
        return view('backend.dict.collect', $param);
    }
}
