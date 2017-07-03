
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
    <link href="<?php echo asset('css/btn.css'); ?>" rel="stylesheet">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <style></style>
</head>
<body>


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
    <form action="<?php echo e(utf8_encode(route('settingUpdate'))); ?>" method="POST" role="form">
        <div class="container col-sm-6 col-sm-offset-3">
            <div class="form-group">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="row">
                    <label for="" class="control-label col-sm-4 text-center-vertical">Thông báo</label>
                    <div class="col-sm-8">

                        <input type="checkbox" id="toggle-two">
                        <script>
                          $(function() {
                            $('#toggle-two').bootstrapToggle({
                                on: 'Bật',
                                off: 'Tắt'
                            });
                        })
                    </script>
                </div>
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
                    <option value="3">  Tất cả</option>    
                </select>
            </div>
        </div>
        <br>
        <div class="row">
          <center><?php echo Form::submit('Lưu', ['class' => 'btn btn-success']); ?></center>
      </div>
      <br>
  </form>
</div>
</div>
<?php echo Form::close(); ?>

</div>
</div>

</body>
</html>

