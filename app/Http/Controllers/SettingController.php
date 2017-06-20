<?php

namespace App\Http\Controllers;

use App\Repositories\SettingRepository;
use Illuminate\Http\Request;
use App\Models\Setting;
use Auth;
use app\Controller\userController;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request)
    {
    $id=Auth::user()->id_user;
    $setting = Setting::where('id_user',$id)->first();
    $time=$request->time;
    $des_info=$request->des_infomation;
    // $setting->id_reminder= $time;
    // $setting->time_to_remind= $name;
    // $setting->save();
    $attributes = ['id_reminder'=>$time,'time_to_remind'=>$des_info];
    Setting::where('id_user',$id)->update($attributes);

    return redirect('/settings')->with("message","<strong>Cài đặt thành công!</strong>");
    // return redirect('/settings')->with("message","<strong>Cài đặt thành công!</strong>");
 }
 
    // echo "update setting o day voi iduser=".$id; 

    // $this->validate($request,[
    //         'time_to_remind' =>'required',
    //         'id_reminder' => 'required'
    //     ]);

    //         $time=$request->time;
    //         $name=$request->name;

    //     $setting->time_to_remind = intval($time);
    //     $setting->id_reminder = intval($name);
    //     if($name==null){
    //          return redirect('/settings')->with("message","<strong>Rất tiếc!</strong>Vui lòng nhập đầy đủ thông tin.");
    // }
    //     else{

    //     $setting->save();
    //     return redirect('/settings')->with("message","<strong>Cài đặt thành công!</strong>");
    // }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
