<?php
namespace App\Http\Controllers;
use App\Repositories\HistoryRepository;
use App\Repositories\NotificationRepository;
use Illuminate\Http\Request;
use App\Models\History;
use App\Models\English;
use App\Services\EnglishService;
use App\Models\Vietnamese;
use App\Services\VietnameseService;
use App\Models\Japanese;
use App\Services\JapaneseService;
use auth;
use DB;
use Session;
use App\Http\Controllers\LaguageController;
use App\Http\Controllers\MyConstant;
use App\Http\Requests\HistoryUpdateRequest;
class HistoryController extends Controller
{
    public function update(Request $request)
    {
        $getTypeVietnamese = MyConstant::TYPE_OF_WORD_VIETNAMESE;
        $lang = DB::table('languages')->get();

        $history= new History;

        $id=Auth::user()->id_user;
        // Lấy ID user để update cho user

        $historys = History::where('id_history', $id)->first();
        $arr= json_decode($historys->content, JSON_UNESCAPED_UNICODE);

        // Input
        $fromText = $request->fromText;
        $toText = $request->toText;

        // Check word existed?
        foreach ($arr as $row) {
            if($fromText == $row['from_text']&&$toText == $row['to_text']){
                $dataResponse = ["data"=>false];
                return json_encode($dataResponse);
            }
        }

        $arr[]= array('type_to'=>$request->typeTo,'from' => $request->from, 'to'=> $request->to,'from_text'=>$fromText,'to_text'=>$toText,'notification'=> 'F');

        $json = json_encode($arr,JSON_UNESCAPED_UNICODE); /*Chuyển mảng mới get qua json*/
        $info = ['content' => $json]; /*Gán column content => file JSon mới get*/
        $successUpdate= History::where('id_history',$id)->update($info);/*Update content nơi mà cái ID của history = với Id của user đang thực hiện add*/

        $dataResponse = ["data" => true];
        return json_encode($dataResponse);
    }

    public function store(Request $request)
    {
        $history= new History;
        $lang = DB::table('languages')->get();
        $getTypeVietnamese = MyConstant::TYPE_OF_WORD_VIETNAMESE;

        $id=Auth::user()->id_user;
        Session::put('fromLg', $request->cb1);
        Session::put('toLg', $request->cb2);

        // Lấy ID user để update cho user
        $historys = History::where('id_history', $id)->first();

        // $data =json_decode($historys->content);
        $arr= json_decode($historys->content, JSON_UNESCAPED_UNICODE);

         return view('frontend.pages.history',['data' => $arr,'Lg' => $lang, 'getTypeVietnamese'=>$getTypeVietnamese]);
    }

public function addNew(Request $request) {
    $englishService = new EnglishService(new English);
    $vietnameseService = new VietnameseService(new Vietnamese);
    $japaneseService = new JapaneseService(new Japanese);
    $history= new History;

    $id=Auth::user()->id_user;

    // Lấy ID user để update cho user
    $historys = History::where('id_history', $id)->first();
    $arr= json_decode($historys->content,JSON_UNESCAPED_UNICODE);

    $tableTo = $request->to;
    $idTo = $request->id;

    switch($tableTo){
        case 'english':
            $rowWord  =  $englishService->getById($idTo);
            break;
        case 'vietnamese':
            $rowWord  =  $vietnameseService->getById($idTo);
            break;
        case 'japanese':
            $rowWord  = $japaneseService->getById($idTo);
    }

    $word = $rowWord->word;
    $typeTo = json_decode($word,JSON_UNESCAPED_UNICODE);

    // Input
    $fromText = $request->from_text;
    $toText = $request->to_text;

    // Check word existed?
    foreach ($arr as $row) {
        if($fromText == $row['from_text']&&$toText == $row['to_text']){
            $dataResponse = ["data"=>"existed"];
            return json_encode($dataResponse);
        }
    }

    $arr[]= array('type_to'=>$typeTo['type'],'from' => $request->from, 'to'=> $request->to,'from_text'=>$fromText,'to_text'=>$toText,'notification'=> 'F');

    $json = json_encode($arr,JSON_UNESCAPED_UNICODE); /*Chuyển mảng mới get qua json*/

    $info = ['content' => $json]; /*Gán column content => file JSon mới get*/

    $successUpdate= History::where('id_history',$id)->update($info);/*Update content nơi mà cái ID của history = với Id của user đang thực hiện add*/

    if(isset($successUpdate)){
        $dataResponse = ["data"=>"fine"];
        return json_encode($dataResponse);
    }
    else{
        $dataResponse = ["data"=>"false"];
        return json_encode($dataResponse);
    }
}

public function deleteRecordByAjax(Request $request){

     $history= new History;

     $id=Auth::user()->id_user;

     $historys = History::where('id_history', $id)->first();// Lấy ID user để update cho user

     $arr= json_decode($historys->content, true); // $data =json_decode($historys->content);

     foreach ($arr as $key => $value) {
        if($value['to_text'] == $request->to && $value['from_text'] == $request->from){

            unset($arr[$key]); /*Xóa record nơi mà từ == key đã chọn ngoài view*/
        }
     }

    $json = json_encode($arr,JSON_UNESCAPED_UNICODE);
    $info = ['content' => $json];
    $successUpdate= History::where('id_history',$id)->update($info);

    if(!$successUpdate){

    $dataResponse = ["data"=>"false"];

    return json_encode($dataResponse);
    }
    else{
        $dataResponse = ["data"=>"fine"];
        return json_encode($dataResponse);
    }
}

public function editInfomationChecker(Request $request){
    $history= new History;

    $id=Auth::user()->id_user;

    $historys = History::where('id_history', $id)->first(); // Lấy ID user để update cho user

    $arr = json_decode($historys->content, JSON_UNESCAPED_UNICODE);
    $toResult = $request->to;
    $fromResult = $request->from;

    foreach ($arr as $key=>$value) {
        if($value['to_text'] == $toResult && $value['from_text'] == $fromResult){
            $arr[$key]['notification'] = $request->notification;
        }
    }

    $json = json_encode($arr,JSON_UNESCAPED_UNICODE);

    $info = ['content' => $json];
    $successUpdate= History::where('id_history',$id)->update($info);
    $dataResponse = ["data"=>"fine"];
    return json_encode($dataResponse);


}
}



