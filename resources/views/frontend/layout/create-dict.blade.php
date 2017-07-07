
<?php $data = DB::table('languages')->get(); ?>
@if(isset($SSMessageDuration))
         <div class="alert alert-success">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <center>{{ $SSMessageDuration }}</center>
         </div>
@endif
<br>

<div id="create-dict"  class="container">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <center><h1><b>THÊM LỊCH SỬ</b></h1></center>
    <br>
</div>
<div class="col-sm-8 col-sm-offset-2 form-group row panel panel-default no-radius-left no-radius-right ">
    <div class="panel-body">
        <div class="panel">
            <div class="panel-body">
                <form class="form-inline" action="{{ route('historyUpdate') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                              <select class="form-control" name="cb1">
                                  @foreach($data as $language)
                                  <option value="{!! $language->language !!}">{!! $language->language !!}</option>
                                  @endforeach
                              </select>
                              @if(isset($getTypeEnglish))
                              <select class="type form-control" name="typeword">
                                  @foreach($getTypeEnglish as $key=>$value)
                                  <option
                                  value="{{ $value }}">{!! $value !!}</option>
                                  @endforeach
                              </select>
                              @endif
                          </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <select class="form-control" name="cb2">
                              @foreach($data as $language)
                              <option value="{!! $language->language !!}">{!! $language->language !!}</option>
                              @endforeach
                          </select>
                          <button type="submit" class="btn btn-success ilearn-background-color">
                              <span class="glyphicon glyphicon-upload"></span>Thêm
                          </button>
                      </div>
                  </div>
              </div>

              <br>

              <div class="row">
                <div class="col-sm-6">
                  <div class="input-group {{ $errors->has('tu') ? ' has-error' : '' }}" >
                      <span class="input-group-addon">Từ</span>
                      <input size="30" id="msg" type="text" class="form-control" name="tu" placeholder="Hello" value="" required>
                  </div>
                  <br>
                   @if ($errors->has('tu'))
                    <span class="help-block">
                        <strong>{!! $errors->first('tu') !!}</strong>
                    </span>
                @endif

                  <div>
                      </div>

                  </div>
                  <div class="col-sm-6">
                      <div class="input-group {{ $errors->has('tu') ? ' has-error' : '' }}">
                          <span class="input-group-addon">Nghĩa</span>
                          <input size="30" id="msg" type="text" class="form-control" name="nghia" placeholder="Xin chào" value="" required>
                      </div>
                      @if ($errors->has('nghia'))
                    <span class="help-block">
                        <strong>{!! $errors->first('nghia') !!}</strong>
                    </span>
                @endif
                  </div>

              </div>
          </form>
      </div>
  </div>
</div>
</div>
