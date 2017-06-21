 <?php $data = DB::table('languages')->get(); ?>
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
<div id="create-dict"  class="container">
    <div class="col-sm-6 col-sm-offset-3 form-group row panel panel-default no-radius-left no-radius-right">
        <div class="panel-body">
            <form action="<?php echo e(route('historyUpdate')); ?>" method="POST" role="form" id="create-dict-form">
               <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
               <div class="create-dict-input">
                <div class="row panel">
                    <div class="row no-margin margin-top">
                        <div class="col-sm-5">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label  class="form-label text-center-vertical">Từ</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tu">
                                </div>
                            </div>
                        </div>
                        

                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label  class="form-label text-center-vertical">Ngôn ngữ</label>
                                </div>
                                <div class="col-sm-7">
                                    <select name="lg1" id="" class="form-control">
                                        <?php foreach($data as $item){
                                            $language = $item->language;
                                            ?>
                                            <option><?php echo e($language); ?></option>
                                            <?php }?>
                                        </select>
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
                                <input type="text" class="form-control" name="nghia">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-5">
                                <label  class="form-label text-center-vertical">Ngôn ngữ</label>
                            </div>
                            <div class="col-sm-7">
                                <select name="lg2" id="" class="form-control">
                                    <?php foreach($data as $item){
                                        $language = $item->language;
                                        ?>
                                        <option><?php echo e($language); ?></option>
                                        <?php }?>
                                    </select>
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
                <?php echo Form::submit("Thêm từ", ['class' => 'btn btn-success']); ?>

            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
</div>