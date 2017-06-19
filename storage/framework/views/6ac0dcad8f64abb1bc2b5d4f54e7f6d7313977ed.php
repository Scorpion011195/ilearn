<?php $__env->startSection('content-header'); ?>
        <h1>
            Thông Tin Cá Nhân
            <small><?php echo e(Session::get('user')->username); ?></small>
        </h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol> -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="panel">
            <div class="panel-body">
                <?php if(session('alertUpdateProfile')): ?>
                    <div class="alert alert-success text-center">
                        <?php echo e(session('alertUpdateProfile')); ?>

                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('adminUpdateProfile')); ?> "  method="post">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <div class="row">
                        <lable class="control-label col-sm-4 text-center-vertical">Email</lable>
                        <div class="col-sm-8">
                            <input type="text" name="profile-email" class="form-control" readonly value="<?php echo e(Session::get('user')->email); ?>">
                        </div>
                    </div>

                    <div class="row margin-top">
                        <lable class="control-label col-sm-4 text-center-vertical">Tên</lable>
                        <div class="col-sm-8">
                            <input type="text" name="profile-name" class="form-control" value="<?php echo e($profile->name); ?>">
                        </div>
                    </div>

                    <div class="row margin-top">
                        <lable class="control-label col-sm-4 text-center-vertical">Địa chỉ</lable>
                        <div class="col-sm-8">
                            <input type="text" name="profile-address" class="form-control" value="<?php echo e($profile->address); ?>">
                        </div>
                    </div>

                    <div class="row margin-top">
                        <lable class="control-label col-sm-4 text-center-vertical">Số điện thoại</lable>
                        <div class="col-sm-8">
                            <input type="text" name="profile-phone" class="form-control" value="<?php echo e($profile->phone); ?>">
                        </div>
                    </div>

                    <div class="row margin-top">
                        <lable class="control-label col-sm-4 text-center-vertical">Ngày sinh</lable>
                        <div class="col-sm-8">
                            <input type="date" name="profile-dob" class="form-control" id="profile-dob" value="<?php echo e($profile->date_of_birth); ?>">
                        </div>
                    </div>

                    <div class="row text-center">
                        <input type="submit" class="btn btn-info margin-top text-center" value="Cập nhật">
                    </div>

                </form>
            </div>
            <hr>
            <div class="panel-body">

                <?php if(session('alertUpdatePassword')): ?>
                    <?php if(session('alertUpdatePassword')=='failNull'): ?>
                        <div class="alert alert-danger text-center">
                            Xin nhập đủ thông tin bên dưới!
                        </div>
                    <?php elseif(session('alertUpdatePassword')=='failPass'): ?>
                        <div class="alert alert-danger text-center">
                            Mật khẩu cũ không đúng!
                        </div>
                    <?php elseif(session('alertUpdatePassword')=='failPassConfirm'): ?>
                        <div class="alert alert-danger text-center">
                            Xác nhận mật khẩu không đúng!
                        </div>
                    <?php else: ?>
                        <div class="alert alert-success text-center">
                            <?php echo e(session('alertUpdatePassword')); ?>

                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <form action="<?php echo e(route('adminChangePassword')); ?>" method="post">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <div class="row margin-top">
                        <lable class="control-label col-sm-4 text-center-vertical">Mật khẩu cũ</lable>
                        <div class="col-sm-8">
                            <input type="password" name="profile-password-old" class="form-control">
                        </div>
                    </div>

                    <div class="row margin-top">
                        <lable class="control-label col-sm-4 text-center-vertical">Mật khẩu mới</lable>
                        <div class="col-sm-8">
                            <input type="password" name="profile-password-new" class="form-control">
                        </div>
                    </div>

                    <div class="row margin-top">
                        <lable class="control-label col-sm-4 text-center-vertical">Nhập lại mật khẩu mới</lable>
                        <div class="col-sm-8">
                            <input type="password" name="profile-password-new-confirm" class="form-control">
                        </div>
                    </div>

                    <div class="row text-center">
                        <input type="submit" class="btn btn-info margin-top text-center" value="Thay đổi mật khẩu">
                    </div>
                </form>
            </div>
        </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.ilearn', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>