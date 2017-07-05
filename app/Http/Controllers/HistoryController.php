<?php
namespace App\Http\Controllers;
use App\Repositories\HistoryRepository;
use App\Repositories\NotificationRepository;
use Illuminate\Http\Request;
use App\Models\History;
use auth;
use DB;
use App\Http\Controllers\LaguageController;
use App\Http\Controllers\MyConstant;
use App\Http\Requests\HistoryUpdateRequest;
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
    public function update(HistoryUpdateRequest $request)
    {   
        $listTypeEnglish = MyConstant::TYPE_OF_WORD_ENGLISH;

        $history= new History;

        $id=Auth::user()->id_user;
        // Lấy ID user để update cho user

        $historys = History::where('id_history', $id)->first();

        $arr= json_decode($historys->content, true);

        $arr[]= array('type_to'=>$request->typeword,'from' => $request->cb1, 'to'=> $request->cb2,'from_text'=>$request->tu,'to_text'=>$request->nghia,'notification'=> 'F');

        if($request->tu  == null && $request->nghia !== null ){

            return redirect('/historys')->with("message","<strong>Lỗi!</strong> Vui lòng nhập đầy đủ thông tin.");
        }
        else{

         $json = json_encode($arr,true);

         $info = ['content' => $json];

         History::where('id_history',$id)->update($info);

         return view('frontend.history',['data' => $arr,
            'getTypeEnglish'=>$listTypeEnglish,
            'SSMessageDuration' => 'History has been update',]);     
        }
     }
     public function store(Request $request)
     {
        $history= new History;

        $listTypeEnglish = MyConstant::TYPE_OF_WORD_ENGLISH;

        $id=Auth::user()->id_user;

                // Lấy ID user để update cho user
        $historys = History::where('id_history', $id)->first();

        // $data =json_decode($historys->content);
        $arr= json_decode($historys->content, true);
        
        return view('frontend.history',['data' => $arr,

            'getTypeEnglish'=>$listTypeEnglish]);
    }
    public function delete($id)
    {

    }
    public function getNotifications($id) {
    }
    public function setNotifications($id, Request $request) {
    }
    public function getSettings($id) {
    }
    public function setSettings($id, Request $request) {
    }
    public function addNew(Request $request) {

        $history= new History;

        $id=Auth::user()->id_user;
        // Lấy ID user để update cho user
        $historys = History::where('id_history', $id)->first();

        $arr= json_decode($historys->content,true);/*Chuyển json thành mảng*/
        $arr[]= array('type_to'=>$request->type,'from' => $request->from, 'to'=> $request->to,'from_text'=>$request->from_text,'to_text'=>$request->to_text,'notification'=> 'F');
       
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

                // Lấy ID user để update cho user
     $historys = History::where('id_history', $id)->first();

        // $data =json_decode($historys->content);
     $arr= json_decode($historys->content, true);

     foreach ($arr as $key => $value) {
        if($value['to_text'] == $request->to || $value['from_text'] == $request->from){
            unset($arr[$key]); /*Xóa record nơi mà từ == key đã chọn ngoài view*/

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
        }
}
}