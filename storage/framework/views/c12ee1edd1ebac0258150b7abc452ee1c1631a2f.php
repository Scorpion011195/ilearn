<?php $data = DB::table('settings')->get();
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

<div class="container panel text-center">
    <div class="panel-body">
    </div>
    <form action="<?php echo e(route('settingUpdate')); ?>" method="POST" role="form">
        <div class="container col-sm-6 col-sm-offset-3">
            <div class="form-group">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="row">
                    <label for="" class="control-label col-sm-4 text-center-vertical">Thời gian nhắc</label>
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
                        <option value="3">Giải thích</option>
                          <option value="4"> Từ với nghĩa</option>
                          <option value="5"> Từ với giải thích</option>
                          <option value="6"> Ngĩa với giải thích</option> 
                          <option value="7">  Tất cả</option>    
                        </select>
                    </div>
                    <br>
                    <br>
                <center><?php echo Form::submit('Cài đặt', ['class' => 'btn btn-success']); ?></center>
            </form>
            </div>
        </div>
        <?php echo Form::close(); ?>

    </div>
</div>