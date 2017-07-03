
<?php $data = DB::table('languages')->get(); ?>
<?php if(isset($SSMessageDuration)): ?>
         <div class="alert alert-success">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <center><?php echo e(utf8_encode($SSMessageDuration)); ?></center>
         </div>
<?php endif; ?>
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
                <form class="form-inline" action="<?php echo e(utf8_encode(route('historyUpdate'))); ?>" method="post">
                    <input type="hidden" name="_token" value="<?php echo e(utf8_encode(csrf_token())); ?>">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                              <select class="form-control" name="cb1">
                                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo $language->language; ?>"><?php echo $language->language; ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                              <?php if(isset($getTypeEnglish)): ?>
                              <select class="form-control" name="typeword">
                                  <?php $__currentLoopData = $getTypeEnglish; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option
                                  value="<?php echo e(utf8_encode($value)); ?>"><?php echo $value; ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                              <?php endif; ?>
                          </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <select class="form-control" name="cb2">
                              <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo $language->language; ?>"><?php echo $language->language; ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                  <div class="input-group <?php echo e(utf8_encode($errors->has('tu') ? ' has-error' : '')); ?>" >
                      <span class="input-group-addon">Từ</span>
                      <input size="30" id="msg" type="text" class="form-control" name="tu" placeholder="Hello" value="">

                  </div>
                   <?php if($errors->has('tu')): ?>
                    <span class="help-block">
                        <strong><?php echo $errors->first('tu'); ?></strong>
                    </span>
                <?php endif; ?>

                  <div>
                      </div>

                  </div>
                  <div class="col-sm-6">
                      <div class="input-group <?php echo e(utf8_encode($errors->has('tu') ? ' has-error' : '')); ?>">
                          <span class="input-group-addon">Nghĩa</span>
                          <input size="30" id="msg" type="text" class="form-control" name="nghia" placeholder="Xin chào" value="">
                      </div>
                      <?php if($errors->has('nghia')): ?>
                    <span class="help-block">
                        <strong><?php echo $errors->first('nghia'); ?></strong>
                    </span>
                <?php endif; ?>
                  </div>

              </div>
          </form>
      </div>
  </div>
</div>
</div>
