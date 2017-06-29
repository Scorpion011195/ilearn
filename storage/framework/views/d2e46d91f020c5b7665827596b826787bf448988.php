<?php echo $__env->yieldContent('css'); ?>
<link href="<?php echo asset('css/result.css'); ?>" rel="stylesheet">
<div class="container">
    <div class="col-xs-12 result">
    <div class = "col-sm-6 col-sm-offset-3 form-group row">
        <div class ="row panel panel-default no-radius-left no-radius-right">
            <div class="col-xs-8 col-sm-6">
                <span class="title">Bản dịch từ:<?php echo ucfirst($inputText); ?></span>
                <form action="<?php echo e(utf8_encode(route('HistoryAddNew'))); ?>" method="POST" role="form">
                    <?php if(isset($workInfo)): ?>
                        <?php $type = '' ?>
                        <?php $__currentLoopData = $workInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $getData ='';?>
                            <?php if(!($type == $language->type)): ?>
                                <?php  $type = $language->type ?>
                                <b class="_type" ><?php echo $language->type; ?></b>:<br>
                                    <?php if(!Auth::guest()): ?>
                                        <span class="glyphicon glyphicon-plus _push-his" id="_id<?php echo $language->id; ?>" data-id="<?php echo $language->id; ?>"><?php echo $language->listen; ?></span>
                                        <span class="glyphicon glyphicon-volume-up" id="_id<?php echo $language->id; ?>"><?php echo $language->listen; ?></span>
                                        <span contenteditable> <?php echo $language ->word; ?> </span> &nbsp;<br>
                                    <?php endif; ?>
                                    <?php if(Auth::guest()): ?>
                                        <span class="glyphicon glyphicon-plus"><?php echo $language->listen; ?></span>
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
                                    <span class="glyphicon glyphicon-plus"><?php echo $language->listen; ?></span>
                                    <span class="glyphicon glyphicon-volume-up"><?php echo $language->listen; ?></span>
                                    <span> <?php echo $language ->word; ?> </span> &nbsp;<br>
                                <?php endif; ?>
                                <?php if(Auth::guest()): ?>
                                    <div class="right-group">
                                        <a href="javascript:void(0);" onclick="loginToAdd()">Đăng nhập</a> để có thêm nhiều tiện ích
                                    </div>
                                <?php endif; ?>

                                <?php if(!Auth::guest()): ?>
                                <div class="right-group">
                                    Góp ý và chỉnh sửa <a data-toggle="modal" data-target="#myModal">Tại đây</a>
                                </div>
                                <?php endif; ?>

                                <input type="hidden" name="getData1" value="<?php echo $language->type; ?>">
                                <input type="hidden" name="getData2" value="<?php echo $language->word; ?>">
                                <input type="hidden" name="getData3" value="<?php echo $language->explain; ?>">
                                <input type="hidden" name="_token" value="<?php echo e(utf8_encode(csrf_token())); ?>">
                            </form>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <!-- test script -->
                <script>
                    $(document).ready(function() {
                        $('._push-his').on('click', function(E){
                            var from = $("#_langFrom :selected").text();
                            var to = $("#_langTo :selected").text();
                            var id = $(this).attr('data-id');
                            var from_text = $('._text-search').val();
                            var to_text = $(this).next().next().text();
                            alert(from+"-"+to+"-"+from_text+"-"+to_text+"-"+id);
                        });
                    } );
                </script>
            </div>
            <div class="col-xs-4 col-sm-6">
                <span class="title">Giải thích từ:<?php echo ucfirst($inputText); ?></span>
                    <?php if(isset($workInfo)): ?>
                        <?php $type = '' ?>
                        <?php $__currentLoopData = $workInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $getData='';
                            ?>
                            <?php if(is_null($language->explain)): ?>
                            <?php else: ?>
                            <?php if(!($type == $language->type)): ?>
                                <?php  $type = $language->type ?><br>
                                    <b class="_type" ><?php echo $language->type; ?></b>:<br>
                                    <span> <?php echo $language ->explain; ?> </span> &nbsp;<br>
                            <?php else: ?>
                                <span> <?php echo $language ->explain; ?> </span> &nbsp;<br>
                            <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
            </div>
        </div>
    </div>
    </div>
</div>
<!-- Modal for edit word : Editer: Trong 10/40/AM/2017/26/06-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Chỉnh sửa từ</h4>
    </div>
    <div class="modal-body">
        <form action="<?php echo e(utf8_encode(route('historyUpdate'))); ?>" method="POST" role="form" id="create-dict-form">
           <input type="hidden" name="_token" value="<?php echo e(utf8_encode(csrf_token())); ?>">
           <div class="create-dict-input">
            <div class="row panel">
                <div class="row no-margin margin-top">
                    <div class="col-sm-5">
                        <div class="row">
                            <div class="col-sm-3">
                                <label  class="form-label text-center-vertical">Từ</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="<?php echo e(utf8_encode($inputText)); ?>" name="tu">
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-5">
                                <label  class="form-label text-center-vertical">Ngôn ngữ</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="cb1" value="<?php echo e(utf8_encode($langueInput)); ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row no-margin margin-top">
                    <div class="col-sm-5">
                        <div class="row">
                            <div class="col-sm-3">
                               <label  class="form-label text-center-vertical">Giải thích</label>
                           </div>
                           <div class="col-sm-9">
                            <input type="text" class="form-control" name="des1">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row no-margin margin-top">
            <div class="col-sm-5">
                <div class="row">
                    <div class="col-sm-3">
                        <label  class="form-label text-center-vertical">Nghĩa</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nghia" value="<?php echo e(utf8_encode($language->word)); ?>">
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-5">
                        <label  class="form-label text-center-vertical">Ngôn ngữ</label>
                    </div>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="cb2" value="<?php echo e(utf8_encode($langueOutput)); ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row no-margin margin-top">
            <div class="col-sm-5">
                <div class="row">
                    <div class="col-sm-3">
                       <label  class="form-label text-center-vertical">Giải thích</label>
                   </div>
                   <div class="col-sm-9">
                    <input type="text" class="form-control" name="des2">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-center row margin-top">
    <?php echo Form::submit("Send", ['class' => 'btn btn-success']); ?>

</div>
<?php echo Form::close(); ?>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>
