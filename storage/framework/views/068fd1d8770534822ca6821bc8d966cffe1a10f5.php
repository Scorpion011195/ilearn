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
    <form action="<?php echo e(utf8_encode(route('settingUpdate'))); ?>" method="POST" role="form">
        <div class="container col-sm-6 col-sm-offset-3">
            <div class="form-group">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="row">
                    <label for="" class="control-label col-sm-4 text-center-vertical" name="">Thông báo</label>
                     <?php if(Session::get('noti') == 'OFF'): ?>
                    <div class="col-sm-8"><input name="noti" type="checkbox" id="toggle-one" data-toggle="toggle" value-on="ON"
                    value= "OFF" data="OFF" data-off="OFF" value= "" ></div>
                    <?php else: ?>
                    <div class="col-sm-8"><input name="noti" type="checkbox" id="toggle-one" data-toggle="toggle" value-on="ON"
                    value= "OFF" data="ON" data-off="OFF" value= "" checked></div>
                    <?php endif; ?>

                </div>
            </div>
            <div class="row">
                <label for="" class="control-label col-sm-4 text-center-vertical">Thời gian</label>
                <div class="col-sm-8">
                    <select name="time" id="" class="form-control">
                    <?php if(isset($time)): ?>
                    <?php $__currentLoopData = $time; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(Session::get('time') == $value): ?>

                        <option value="<?php echo $value; ?>" selected="true"><?php echo $value; ?> phút</option>
                    <?php else: ?>
                    <option value="<?php echo $value; ?>"><?php echo $value; ?> phút</option>
                    
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
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
                            <?php if(Session::get('info') == $remind): ?>
                            <option value="<?php echo $remind; ?>" selected><?php echo $value->type; ?></option>
                            <?php else: ?>
                            <option value="<?php echo $value->id_reminder; ?>"><?php echo $value->type; ?></option>
                            <?php endif; ?>
                            <?php }?>

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

