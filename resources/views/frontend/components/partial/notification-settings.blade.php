   <?php
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
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style= "padding-top: 10px">
    <center> <h1>Cài đặt thông báo</h1></center>
</div>
<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

</div>
<div class="col-sm-8 container panel " style="box-shadow: 0.5px 1px 5px rgba(0, 0, 0, 10);" >
    <div class="panel-body">
    </div>
    <form action="{{ route('settingUpdate') }}" method="POST" role="form">
        <div class="container col-sm-6 col-sm-offset-3">
            <div class="form-group">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="row">
                    <label for="" class="control-label col-sm-4 text-center-vertical">Thông báo</label>
                    <div class="col-sm-8"><input type="checkbox" id="toggle-one" data-toggle="toggle" data-on="Bật" data-off="Tắt"></div>
                </div>
            </div>
        <div class="row">
        <label for="" class="control-label col-sm-4 text-center-vertical">Thời gian</label>
            <div class="col-sm-8">
                <select name="time" id="" class="form-control">
                    <option value="5">5 phút</option>
                    <option value="10">10 phút</option>
                    <option value="15">15 phút</option>
                    <option value="20">20 phút</option>
                    <option value="25">25 phút</option>
                    <option value="60">1 tiếng</option>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <label for="" class="control-label col-sm-4 text-center-vertical">Hiển thị</label>
            <div class="col-sm-8">
                <select name="des_infomation" id="" class="form-control">
                    <option value="1">Từ</option>
                    <option value="2">Nghĩa</option>
                    <option value="3">Từ và nghĩa</option>
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

