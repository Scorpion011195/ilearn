<?php echo $__env->yieldContent('css'); ?>
<link href="<?php echo asset('css/result.css'); ?>" rel="stylesheet">
<div class="container">
    <div class="col-xs-12 result">
        <div class = "col-sm-6 col-sm-offset-3 form-group row">
            <div class ="row panel panel-default no-radius-left no-radius-right">
                <div class="col-xs-8 col-sm-6">
                <span class="title">Bản dịch từ:<?php echo ($inputText); ?></span>
                    <?php if(isset($workInfo)): ?>
                        <?php $type = '' ?>
                        <?php $__currentLoopData = $workInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $getData ='';?>
                            <?php if(!($type == $language->type)): ?>
                                <?php  $type = $language->type ?> <br>
                                <b class="type" ><?php echo $language->type; ?></b>:<br> 
                                    <?php if(!Auth::guest()): ?>
                                        <span class="glyphicon glyphicon-plus _push-his" id="_id<?php echo $language->id; ?>" data-id="<?php echo $language->id; ?>"><?php echo $language->listen; ?></span>
                                        <span class="glyphicon glyphicon-volume-up" id="_id<?php echo $language->id; ?>"><?php echo $language->listen; ?></span>
                                        <span contenteditable> <?php echo $language ->word; ?> </span> &nbsp;<br>
                                    <?php endif; ?>
                                    <?php if(Auth::guest()): ?>
                                        <span><?php echo $language->listen; ?></span>
                                        <span class="glyphicon glyphicon-volume-up"><?php echo $language->listen; ?></span>
                                        <span> <?php echo $language ->word; ?> </span> &nbsp;<br>
                                    <?php endif; ?>
                            <?php else: ?>

                                <?php if(!Auth::guest()): ?>
                                    <span class="glyphicon glyphicon-plus _push-his" id="_id<?php echo $language->id; ?>" data-id="<?php echo $language->id; ?>"><?php echo $language->listen; ?></span>
                                    <span class="glyphicon glyphicon-volume-up" id="_id<?php echo $language->id; ?>"><?php echo $language->listen; ?></span>
                                    <span contenteditable> <?php echo $language ->word; ?> </span> &nbsp;<br>
                                <?php endif; ?>
                                <?php if(Auth::guest()): ?>
                                    <span><?php echo $language->listen; ?></span>
                                    <span class="glyphicon glyphicon-volume-up"><?php echo $language->listen; ?></span>
                                    <span> <?php echo $language ->word; ?> </span> &nbsp;<br>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>                                  
                </div>
                <div class="col-xs-4 col-sm-6">
                    <span class="title">Giải thích từ:&nbsp;<?php echo ($inputText); ?></span>
                        <?php if(isset($workInfo)): ?>
                            <?php $type = '' ?>
                            <?php $__currentLoopData = $workInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                $getData='';
                                ?>
                                <?php if(empty($language->explain)): ?>

                                <?php else: ?>
                                    <?php if(!($type == $language->type)): ?>
                                        <?php  $type = $language->type ?><br>
                                        <b class="_type" ><?php echo $language->type; ?></b>:<br>
                                        <span> <?php echo $language ->explain; ?> </span> &nbsp;<br>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                </div>            
            </div>
            <?php if(Auth::guest()): ?>
                <div class="right-group">
                    <a href="javascript:void(0);" onclick="loginToAdd()">Đăng nhập</a> để có thêm nhiều tiện ích
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>    