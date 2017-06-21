<?php echo Form::open(array('route' => 'search')); ?>

<div class="center textXXX">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 form-group row">
            <h1 class="text-center">ILEARN</h1>
        </div>
        
       
        <div class="col-sm-6 col-sm-offset-3 form-group row">
            <div class="col-sm-10 no-padding">
                <?php echo Form::text('search', '', ['class' => 'form-control no-radius-right', 'autofocus']); ?>

            </div>
            <?php echo Form::submit('Tra từ', ['class' => 'btn btn-success ilearn-background-color col-sm-2 no-radius-left']); ?>

        </div>
        <?php $data = DB::table('languages')->get(); ?>

                <div class="col-sm-6 col-sm-offset-3 form-group row">
                    <div class="col-sm-3 form-inline ">
                        <label for="sel1">Nguồn:</label>
                        <select name="cb1" class="form-control ilearn-margin-right" id="sel1">
                               <?php foreach($data as $item){
                                $language = $item->language;
                                ?>
                            <option value="<?php echo e($item->language); ?>"><?php echo e($language); ?></option>
                            <?php }?>
                        </select> 
                    </div>
                    <div class="col-sm-3 form-inline ">
                        <label for="sel1"> Đích:</label>
                        <select name="cb2" class="form-control ilearn-margin-right" id="sel1">
                               <?php foreach($data as $item){
                                $language = $item->language;
                                ?>
                                <option value="<?php echo e($item->language); ?>"><?php echo e($language); ?></option>
                            <?php }?>
                        </select> 
                    </div>
                </div>
        <?php echo Form::close(); ?>

        <div class="result">
            <?php echo $__env->make('frontend.layout.ketqua', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="create-dict">
            <?php echo $__env->make('frontend.layout.create-dict', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>

</div>