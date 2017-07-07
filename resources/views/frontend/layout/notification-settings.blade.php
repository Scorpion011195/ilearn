   <?php
   $data = DB::table('setting_type_reminders')->get(); 
   $time= array('5','10','15','20','25','60');
   foreach ($data as  $value) {
    $id = $value->id_reminder;
    }
      if (Session::has('message')) {
     ?>
     <div class="alert alert-success">
        <?php
        $message = Session::get('message');
        echo "<center>".$message."</center>";
        ?>

    </div>
    <?php

}
?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 info" style= "padding-top: 10px">
    <center> <h1 class="titelSetting"><b>CÀI ĐẶT THÔNG BÁO</b></h1></center>
</div>
<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

</div>
<div class="col-sm-8 containerpanel "" >
    <div class="panel-body">
    </div>
    <form action="{{ route('settingUpdate') }}" method="POST" role="form">
        <div class="container col-sm-6 col-sm-offset-3">
            <div class="form-group">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="row">
                    <label for="" class="control-label col-sm-4 text-center-vertical" name="">Thông báo</label>
                     @if(Session::get('noti') == 'OFF')
                    <div class="col-sm-8"><input name="noti" type="checkbox" id="toggle-one" data-toggle="toggle" value-on="ON"
                    value= "OFF" data="OFF" data-off="OFF" value= "" ></div>
                    @else(Session::get('status') == 'ON')
                    <div class="col-sm-8"><input name="noti" type="checkbox" id="toggle-one" data-toggle="toggle" value-on="ON"
                    value= "OFF" data="ON" data-off="OFF" value= "" checked></div>
                    @endif

                </div>
            </div>
            <div class="row">
                <label for="" class="control-label col-sm-4 text-center-vertical">Thời gian</label>
                <div class="col-sm-8">
                    <select name="time" id="" class="form-control">
                    @if(isset($time))
                    @foreach($time as $value)
                    @if (Session::get('time') == $value)

                        <option value="{!!$value!!}" selected="true">{!!$value!!} phút</option>
                    @else
                    <option value="{!!$value!!}">{!!$value!!} phút</option>
                    
                    @endif
                    @endforeach
                    @endif
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <label for="" class="control-label col-sm-4 text-center-vertical">Hiển thị</label>
                <div class="col-sm-8">
                    <select name="des_infomation" id="" class="form-control">

                    <?php foreach($data as $value){
                             $remind = $value->id_reminder;
                            ?>
                            @if (Session::get('info') == $remind)
                            <option value="{!!$remind!!}" selected>{!!$value->type!!}</option>
                            @else
                            <option value="{!!$value->id_reminder!!}">{!!$value->type!!}</option>
                            @endif
                            <?php }?>

                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                  <center>{!! Form::submit('Lưu', ['class' => 'btn btn-success']) !!}</center>
              </div>
              <br>
          </form>
      </div>
  </div>
  {!! Form::close() !!}
</div>
</div>

