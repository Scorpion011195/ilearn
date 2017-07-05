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
        $timeSetting= array('5','10','15','20','25','60');
        $time=$request->time;
        $des_info=$request->des_infomation;
    // $setting->id_reminder= $time;
    // $setting->time_to_remind= $name;
    // $setting->save();
        $attributes = ['id_reminder'=>$des_info,'time_to_remind'=>$time];
        Setting::where('id_user',$id)->update($attributes);
         Session::put('time', $request->time);
        Session::put('info', $request->des_infomation);

        // return view('frontend.settings',['time'=>$timeSetting]);
    return redirect('/settings')->with("message","<strong>Cài đặt thành công!</strong>");
    }
    


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
