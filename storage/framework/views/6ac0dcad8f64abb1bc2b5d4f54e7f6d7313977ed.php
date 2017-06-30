<?php $__env->startSection('content-header'); ?>
    <h1>Thông Tin Cá Nhân</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="panel">
        <div class="panel-body">
            <?php if(session('alertUpdateProfile')): ?>
            <div>
              <p style="color:blue"><span class="glyphicon glyphicon-ok"></span>   <?php echo session('alertUpdateProfile'); ?></p>
            </div>
            <?php endif; ?>
            <form action="<?php echo e(utf8_encode(route('adminUpdateProfile'))); ?> "  method="post">
                <input type="hidden" name="_token" value="<?php echo e(utf8_encode(csrf_token())); ?>">
                <div class="row">
                    <lable class="control-label col-sm-4 text-center-vertical">Email</lable>
                    <div class="col-sm-8">
                        <input type="text" name="profile-email" class="form-control" readonly value="<?php echo e(utf8_encode(Session::get('user')->email)); ?>">
                    </div>
                </div>
                <div class="row margin-top">
                    <lable class="control-label col-sm-4 text-center-vertical">Tên</lable>
                    <div class="col-sm-8 <?php echo $errors->has('profile-name') ? ' has-error' : ''; ?>">
                        <input type="text" name="profile-name" class="form-control"
                        <?php if($errors->has('profile-name')): ?>
                          value="<?php echo old('profile-name'); ?>"
                        <?php else: ?>
                          value="<?php echo $profile->name; ?>"
                        <?php endif; ?> >
                    </div>
                </div>
                <?php if($errors->has('profile-name')): ?>
                  <div>
                    <div class="control-label col-sm-4 text-center-vertical"></div>
                    <div class="col-sm-8 <?php echo $errors->has('profile-name') ? ' has-error' : ''; ?>">
                      <div>
                          <p class="help-block"><span class="glyphicon glyphicon-warning-sign"></span>   <strong><?php echo $errors->first('profile-name'); ?></strong></p>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                <div class="row margin-top">
                    <lable class="control-label col-sm-4 text-center-vertical">Địa chỉ</lable>
                    <div class="col-sm-8 <?php echo e(utf8_encode($errors->has('profile-address') ? ' has-error' : '')); ?>">
                        <input type="text" name="profile-address" class="form-control"
                        <?php if($errors->has('profile-address')): ?>
                          value="<?php echo old('profile-address'); ?>"
                        <?php else: ?>
                          value="<?php echo $profile->address; ?>"
                        <?php endif; ?> >
                    </div>
                </div>
                <?php if($errors->has('profile-address')): ?>
                  <div>
                    <div class="control-label col-sm-4 text-center-vertical"></div>
                    <div class="col-sm-8 <?php echo e(utf8_encode($errors->has('profile-address') ? ' has-error' : '')); ?>">
                      <div>
                          <p class="help-block"><span class="glyphicon glyphicon-warning-sign"></span>   <strong><?php echo $errors->first('profile-address'); ?></strong></p>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                <div class="row margin-top">
                    <lable class="control-label col-sm-4 text-center-vertical">Số điện thoại</lable>
                    <div class="col-sm-8 <?php echo e(utf8_encode($errors->has('profile-phone') ? ' has-error' : '')); ?>">
                        <input type="text" name="profile-phone" class="form-control"
                        <?php if($errors->has('profile-phone')): ?>
                          value="<?php echo old('profile-phone'); ?>"
                        <?php else: ?>
                          value="<?php echo $profile->phone; ?>"
                        <?php endif; ?> >
                    </div>
                </div>
                <?php if($errors->has('profile-phone')): ?>
                  <div>
                    <div class="control-label col-sm-4 text-center-vertical"></div>
                    <div class="col-sm-8 <?php echo e(utf8_encode($errors->has('profile-phone') ? ' has-error' : '')); ?>">
                      <div>
                          <p class="help-block"><span class="glyphicon glyphicon-warning-sign"></span>   <strong><?php echo $errors->first('profile-phone'); ?></strong></p>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                <div class="row margin-top">
                    <lable class="control-label col-sm-4 text-center-vertical">Ngày sinh</lable>
                    <div class="col-sm-8 <?php echo e(utf8_encode($errors->has('profile-dob') ? ' has-error' : '')); ?>">
                        <input type="date" name="profile-dob" class="form-control" id="profile-dob" value="<?php echo e(utf8_encode($profile->date_of_birth)); ?>">
                    </div>
                </div>
                <?php if($errors->has('profile-dob')): ?>
                  <div>
                    <div class="control-label col-sm-4 text-center-vertical"></div>
                    <div class="col-sm-8 <?php echo e(utf8_encode($errors->has('profile-dob') ? ' has-error' : '')); ?>">
                      <div>
                          <p class="help-block"><span class="glyphicon glyphicon-warning-sign"></span>   <strong><?php echo $errors->first('profile-dob'); ?></strong></p>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                <div class="row text-center">
                    <input type="submit" class="btn btn-info margin-top text-center" value="Cập nhật">
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo asset('js/admin/admin-profile.js'); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.ilearn', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>