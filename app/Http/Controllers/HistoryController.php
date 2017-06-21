<?php

namespace App\Http\Controllers;

use App\Repositories\HistoryRepository;
use App\Repositories\NotificationRepository;
use Illuminate\Http\Request;
use App\Models\History;
use auth;
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
    {   
        $data = array();
        $history= new History;

        $id=Auth::user()->id_user;
        // Lấy ID user để update cho user

        $historys = History::where('id_history', $id)->first();

        $arr= json_decode($historys->content, true);
        // chuyển dât trong db từ json sang array

        $arr[]= array('from_text'=>$request->tu,'from_language'=>$request->lg1, 'from_description'=>$request->des1,' to_text'=> $request->nghia, 'to_language'=>$request->lg2, 'to_description' =>$request->des2, 'notification' => 'F');
        if($request->tu  == null || $request->nghia == null ){
            return "Lỗi";
        }
        // mảng mới dduocj update contnent
        else{

            $json = json_encode($arr,true);
            //  chuyển qua json


            $info = ['content' => $json];

            History::where('id_history',$id)->update($info);
        // update into DB

             return redirect('/historys')->with("message","<strong>Chúc mừng!</strong> Bạn vừa thêm từ <b><i>{$request->tu}</i></b> vào lịch sử.");
        //     // save data into databse from form in frontend 
        // return redirect('/historys')->with("message","<strong>Chúc mừng!</strong> Bạn vừa thêm từ <b><i>{$request->tu}</i></b> vào lịch sử.");
          }
       }
    public function store(Request $request)
    {
        $data= DB::select('select * from historys');
        return $data;
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
}
