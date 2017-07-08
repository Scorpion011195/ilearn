
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 info" style= "padding-top: 10px">
    <center> <h1 class="titelSetting"><b>CÀI ĐẶT THÔNG BÁO</b></h1></center>
</div>
<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

</div>
<div class="col-sm-8 containerpanel "" >
    <div class="panel-body">
    </div>
    <form action="" method="" role="form">
        <div class="container col-sm-6 col-sm-offset-3">
            <div class="form-group">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <label for="" class="control-label col-sm-4 text-center-vertical" name="">Thông báo</label>
                    <div class="col-sm-8"><input name="noti" type="checkbox" id="toggle-one" data-toggle="toggle"  data="ON" data-off="OFF"
                    @if($status == 'ON')
                      {{ "checked" }}
                    @endif
                    ></div>
                </div>
            </div>
            <div class="row">
                <label for="" class="control-label col-sm-4 text-center-vertical">Thời gian</label>
                <div class="col-sm-8">
                    <select name="time" id="_time" class="form-control">
                       @foreach($typeTime as $value)
                         <option value="{!!$value!!}" 
                            @if($time == $value)
                            {{"selected"}}
                            @endif
                         >{!!$value!!} phút</option>
                       @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <label for="" class="control-label col-sm-4 text-center-vertical">Hiển thị</label>
                <div class="col-sm-8">
                    <select name="des_infomation" id="_typeRemind" class="form-control">
                      @foreach($arrTypeReminder as $key => $value)
                            <option value="{{$key}}" 
                            @if($value == $typeReminder)
                              {{"selected"}}
                            @endif
                            >{!!$value!!}</option>
                      @endforeach
                    </select>
                </div>
            </div>
                <br>
                <div class="row">
                  <center>{!! Form::submit('Lưu', ['class' => 'save-setting btn btn-success']) !!}</center>
              </div>
              <br>
          </form>
      </div>
  </div>
  {!! Form::close() !!}
</div>
</div>
