
<div class="container">
    <div class="col-sm-6 col-sm-offset-3 form-group row panel panel-default no-radius-left no-radius-right">
        <div class="panel-body">

        </div>
        <div class="panel-footer background-white">
            <?php if(isset($workInfo)): ?>

            <?php $__currentLoopData = $workInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <b><?php echo e($language->type); ?></b>:<?php echo e($language ->word); ?> &nbsp;                     
            <span class="glyphicon glyphicon-volume-up"><?php echo e($language->listen); ?>

            </span><br>
            Explain:<?php echo e($language->explain); ?>

            <hr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <?php if(Auth::guest()): ?> 
            <div class="panel-footer background-white">
                <div class="rigt-group">
                    <a href="javascript:void(0);" onclick="loginToAdd()">Đăng nhập</a> để có thêm nhiều tiện ích
                </div>
            </div>
            <?php endif; ?>

            <?php if(!Auth::guest()): ?>
            <div class="right-group">
                <button class="btn btn-primary" data-toggle="" data-target="">Thêm từ mới</button>

            </div>
            <?php endif; ?>
        </div>
    </div>
</div> 