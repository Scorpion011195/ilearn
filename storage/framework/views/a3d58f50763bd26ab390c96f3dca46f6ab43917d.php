    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 form-group row">
            <h1 class="text-center">ILEARN</h1>
        </div>
        <?php echo Form::open(array('route' => 'search', 'class' =>'container')); ?>

        <div class="col-sm-6 col-sm-offset-3 form-group row">
            <div class="col-sm-10 no-padding">
                <?php echo Form::text('search', '', ['class' => 'form-control no-radius-right _text-search', 'autofocus']); ?>

            </div>
            <?php echo Form::submit('Tra từ', ['class' => 'btn btn-success ilearn-background-color col-sm-2 no-radius-left']); ?>

        </div>
        <div class="col-sm-6 col-sm-offset-3 form-group row">
            <div class="col-sm-3 form-inline ">
                <label for="sel1">Nguồn:</label>
                <select name="cb1" class="form-control ilearn-margin-right" id="_langFrom">
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
            <div class="col-sm-3 form-inline ">
                <label for="sel1"> Đích:</label>
                <select name="cb2" class="form-control ilearn-margin-right" id="_langTo">
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
     <?php if(count($errors) > 0): ?>
         <div class = "alert alert-danger">
            <ul>
               <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e(utf8_encode($error)); ?></li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
         </div>
    <?php endif; ?>
    <br>
<div class="result">
    <?php echo $__env->make('frontend.layout.result', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<div class="create-dict">
    <?php echo $__env->make('frontend.layout.create-dict', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
