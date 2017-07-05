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
    // Get key of type word
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

    // Key to type
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

    /* Statistic words of one user
    Called by function statisticAllUser() */
    function statisticOneUser($idUser){
        $lengthStatistic = sizeof(MyConstant::$arr_statistic_word);

        $arrContent = $this->getHistoryOfUser($idUser);

        foreach ($arrContent as $rowOfContentUser) {
            $i=0;
            foreach(MyConstant::$arr_statistic_word as $rowOfStatistic){
                // If word existed -> Increase quanlity
                if($rowOfContentUser->from_text==$rowOfStatistic['from_text']&&$rowOfContentUser->to_text==$rowOfStatistic['to_text']){
                    MyConstant::$arr_statistic_word[$i]['quanlity']++;
                    break;
                }

                $i++;

                // If word doesn't exist -> Add word to array, quanlity=1
                if($i == $lengthStatistic){
                    $stt = sizeof(MyConstant::$arr_statistic_word);
                    $stt++;

                    // Check word exist in database?
                    $tableFrom = $rowOfContentUser->from;
                    $tableTo = $rowOfContentUser->to;
                    $column = 'word';
                    $wordFrom = $rowOfContentUser->from_text;
                    $typeTo = $rowOfContentUser->type_to;
                    $keyType = $this->getKeyFromValue($tableTo, $typeTo);
                    $typeFrom = $this->getValueFromKey($tableFrom, $keyType);
                    $isAdded = DictionaryManagementController::checkWordExist($tableFrom, $column, $wordFrom, $typeFrom);
                    if($isAdded){
                        $status = 'Added';
                    }
                    else{
                        $status = 'Waiting';
                    }

                    // Add word to statistical array
                    $pushMe = ['STT'=>$stt,'from'=>$rowOfContentUser->from,'to'=>$rowOfContentUser->to,'from_text'=>$rowOfContentUser->from_text,'to_text'=>$rowOfContentUser->to_text,'quanlity'=>1,'type_from'=>$typeFrom,'status'=> $status];

                    array_push(MyConstant::$arr_statistic_word, $pushMe);
                }
            }
        }
    }

    // Statistic of entire users
    function statisticAllUser(){
        $userService = new UserService(new User);
        $users = $userService->getAll();

        $countUsers = $users->count();

        // Reset submitions table
        $submitionService = new SubmitionService(new Submition);
        $submitionService->reset();

        // Statistic -> Store in MyConstant::$arr_statistic_word
        for($i=0; $i<$countUsers; $i++){
            $idUser = $users[$i]->id_user;

            $this->statisticOneUser($idUser);
        }

        // Push result to submitions table
        foreach (MyConstant::$arr_statistic_word as $row) {
            if($row['quanlity']==0){
                continue;
            }
            $submitionService->create($row);
        }
    }

    // Display result after statistic
    function displayStatisticalResult(){
        $noOfSubmitions = Submition::count();
        $noOfPages = 5;
        $submitions = Submition::orderBy('quanlity', 'DESC')->paginate($noOfPages);
        $listSearch = ['Tất cả','Added','Waiting'];
        $cbTypeWord = "Tất cả";

        $param = ['submitions'=>$submitions,'noOfSubmitions'=>$noOfSubmitions, 'listSearch'=>$listSearch,'cbTypeWord'=>$cbTypeWord];
        return view('backend.pages.dict.collect', $param);
    }

    // Display result by condition
    function displayStatisticalResultByCondition(Request $request){
        // Input
        $condition = $request->_condition;

        $noOfPages = 5;
        $listSearch = ['Tất cả','Added','Waiting'];

        switch ($condition) {
            case 'Tất cả':
                $submitions = Submition::orderBy('quanlity', 'DESC')->paginate($noOfPages);
                $noOfSubmitions = Submition::count();
                $cbTypeWord = "Tất cả";
                break;
            case 'Added':
                $submitions = Submition::where('status','Added')->orderBy('quanlity', 'DESC')->paginate($noOfPages);
                $noOfSubmitions = Submition::where('status','Added')->count();
                $cbTypeWord = "Added";
                break;
            case 'Waiting':
                $submitions = Submition::where('status','Waiting')->orderBy('quanlity', 'DESC')->paginate($noOfPages);
                $noOfSubmitions = Submition::where('status','Waiting')->count();
                $cbTypeWord = "Waiting";
        }
        $param = ['submitions'=>$submitions,'noOfSubmitions'=>$noOfSubmitions, 'listSearch'=>$listSearch, 'cbTypeWord'=>$cbTypeWord];
        return view('backend.pages.dict.collect', $param);
    }
}
