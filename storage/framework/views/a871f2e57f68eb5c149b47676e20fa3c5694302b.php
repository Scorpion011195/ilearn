
<div class="register modal fade" id="modal-register" role="dialog">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4  panel no-radius-right no-radius-left">
                <?php echo Form::open(array('route' => 'dangki')); ?>

                <div class="panel-heading text-center">
                    <h3>TẠO TÀI KHOẢN</h3>
                </div>
                <hr class="no-margin no-padding">
                <div class="panel-body">
                    <div class="panel-content">
                        <div class="row">
                            <div class="input-group <?php echo e($errors->has('username') ? ' has-error' : ''); ?> ">
                                <span class="input-group-addon "><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input id="username" type="text" class="form-control" name="username" value="<?php echo e(old('username')); ?>" required autofocus placeholder="Tên của bạn">
                                <?php if($errors->has('username')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('username')); ?></strong>
                                    </span>
                                <?php endif; ?> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-group <?php echo e($errors->has('email') ? ' has-error' : ''); ?> ">
                                <span class="input-group-addon "><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus placeholder="Email của bạn">
                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-group <?php echo e($errors->has('password') ? ' has-error' : ''); ?> ">
                                <span class="input-group-addon "><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                                <input id="password" type="password" class="form-control" name="password" value="<?php echo e(old('password')); ?>" required autofocus placeholder="Mật khẩu của bạn">
                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?> 
                            </div>
                        </div>
                        <div class="row">
                             <div class="input-group <?php echo e($errors->has('confirm_password') ? ' has-error' : ''); ?> ">
                                <span class="input-group-addon "><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                                <input id="confirm_password" type="password" class="form-control" name="confirm_password" value="<?php echo e(old('confirm_password')); ?>" required autofocus placeholder="Nhập lại mật khẩu của bạn">
                                <?php if($errors->has('pasword')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('confirm_password')); ?></strong>
                                    </span>
                                <?php endif; ?> 
                            </div>
                        </div>
                    </div>
                        </div>
                        <hr class="no-margin no-padding">
                        <div class="panel-footer text-center background-white ">
                    <?php echo Form::submit('Tạo mới', ['class' => 'btn btn-success btn-lg']); ?>

                            <button class="btn btn-default" data-dismiss="modal">Hủy</button>
                     </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>

</div>