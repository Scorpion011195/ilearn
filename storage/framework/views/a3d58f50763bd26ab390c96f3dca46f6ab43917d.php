<?php echo $__env->yieldContent('css'); ?>
<link href="<?php echo e(utf8_encode(asset('css/search.css'))); ?>" rel="stylesheet">
<div class="row">
    <div class="col-sm-6 col-sm-offset-3 form-group row">
        <h1 class="text-center">ILEARN</h1>
    </div>
    <?php echo Form::open(array('route' => 'search','method' => 'get', 'class' =>'container')); ?>

    <div class="col-sm-6 col-sm-offset-3 form-group row">
        <div class="col-sm-10 no-padding">
            <?php echo Form::text('search', '', ['id' => 'from','class' => 'form-control no-radius-right', 'autofocus']); ?>
        </div>
        <?php echo Form::submit('Tra từ', ['class' => 'btn btn-success ilearn-background-color col-sm-2 no-radius-left']); ?>

        <div class="error-form">
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <?php echo $errors->first('search'); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-sm-6 col-sm-offset-3 form-group row ">
        <div class="col-sm-3 col-sm-offset-3 ">
            <label for="sel1">Nguồn:</label>
            <select name="lagFrom" class="form-control" id="sel1">
             <?php foreach($data as $item =>$value){
                $language = $value->language;
                ?>
                <?php if(\Session::get('flagLanguage1') == $language): ?>
                <option value="<?php echo $language; ?>" selected><?php echo $language; ?></option>
                <?php else: ?>
                <option value="<?php echo $language; ?>"><?php echo $language; ?></option>
                <?php endif; ?>
                <?php }?>
            </select>
        </div>

        <div class="col-sm-3 col-sm-offset-0 ">
            <label for="sel1"> Đích:</label>
            <select name="lagTo" class="form-control" id="sel1">
             <?php foreach($data as $item =>$value){
                $language = $value->language;
                ?>
                <?php if(\Session::get('flagLanguage2') == $language): ?>
                <option value="<?php echo $language; ?>" selected><?php echo $language; ?></option>
                <?php else: ?>
                <option value="<?php echo $language; ?>"><?php echo $language; ?></option>
                <?php endif; ?>
                <?php }?>
            </select>
        </div>
    </div>
    <?php echo Form::close(); ?>

</div>
<br>
<div class="result">
<?php echo $__env->make('frontend.layout.result', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>

<div class="create-dict">
<?php echo $__env->make('frontend.layout.create-dict', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>


</div>

</div>


