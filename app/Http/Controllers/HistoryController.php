<?php

namespace App\Http\Controllers;

use App\Repositories\HistoryRepository;
use App\Repositories\NotificationRepository;
use Illuminate\Http\Request;
use App\Models\History;
use auth;
use DB;
use App\Http\Controllers\LaguageController;
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
    public function update(Request $request)

        $history= new History;

        $id=Auth::user()->id_user;
        // Lấy ID user để update cho user

        $historys = History::where('id_history', $id)->first();

        $arr= json_decode($historys->content, true);
        // chuyển dât trong db từ json sang array
        $a=count($arr);
        $arr[]= array('STT'=> $a,'from' => $request->cb1, 'to'=> $request->cb2,'from_text'=>$request->tu,'to_text'=>$request->nghia, 'from_explain'=> $request->des1, 'to_explain'=> $request->des2,'notification' => 'F');

        if($request->tu  == null || $request->nghia == null ){
            return redirect('/historys')->with("message","<strong>Lỗi!</strong> Vui lòng nhập đầy đủ thông tin.");
        }
        else{

           $json = json_encode($arr,true);
           $info = ['content' => $json];

           History::where('id_history',$id)->update($info);
            return view('frontend.history',['data' => $arr]);
       }
            History::where('id_history',$id)->update($info);
        // update into DB
             // return redirect('/historys')->with("message","<strong>Chúc mừng!</strong> Bạn vừa thêm từ <b><i>{$request->tu}</i></b> vào lịch sử.");
        //     // save data into databse from form in frontend
        // return redirect('/historys')->with("message","<strong>Chúc mừng!</strong> Bạn vừa thêm từ <b><i>{$request->tu}</i></b> vào lịch sử.");
          }
       }

   public function store(Request $request)
   {
    $history= new History;

    $id=Auth::user()->id_user;
            // Lấy ID user để update cho user
    $historys = History::where('id_history', $id)->first();
    // $data =json_decode($historys->content);
    $arr= json_decode($historys->content, true);
    return view('frontend.history',['data'=>$arr]);
}

public function delete($id)
{
            // TODO: Implement delete() method.
}

public function getNotifications($id) {

}

public function setNotifications($id, Request $request) {

}

public function getSettings($id) {

}

public function setSettings($id, Request $request) {

}

public function AddNew(Request $request) {

    $NewWord= $request->getData1;
    $NewWord1= $request->getData2;
    $NewWord2=$request->getData3;
    $NewWord3= $request->SelectData;

var_dump($NewWord, $NewWord1, $NewWord2, $NewWord3);


}
}
