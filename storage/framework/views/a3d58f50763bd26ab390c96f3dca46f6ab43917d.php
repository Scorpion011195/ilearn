<div class="center">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 form-group row">
            <h1 class="text-center">ILEARN</h1>
        </div>
        <?php echo Form::open(['class' =>'container']); ?>

        <div class="col-sm-6 col-sm-offset-3 form-group row">
            <div class="col-sm-10 no-padding">
                <?php echo Form::text('search', '', ['class' => 'form-control no-radius-right', 'autofocus']); ?>

            </div>
            <?php echo Form::submit('Tra từ', ['class' => 'btn btn-success ilearn-background-color col-sm-2 no-radius-left']); ?>

        </div>
        <div class="col-sm-6 col-sm-offset-3 form-group row">
            <div class="col-sm-3 col-sm-offset-3 no-padding form-inline ">
                <?php echo Form::label('source', 'Nguồn'); ?>

                <?php echo Form::select('source', ['1' => 'Anh', '2' => 'Việt'], '', ['class' => 'form-control ilearn-margin-right']); ?>

            </div>
            <div class="col-sm-3 no-padding form-inline">
                <?php echo Form::label('dest', 'Đích'); ?>

                <?php echo Form::select('dest', ['1' => 'Anh', '2' => 'Việt'], '', ['class' => 'form-control ilearn-margin-right']); ?>

            </div>
        </div>
        <?php echo Form::close(); ?>

        <div class="result">
            <?php echo $__env->make('frontend.layout.result', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

        <div class="create-dict">
            <?php echo $__env->make('frontend.layout.create-dict', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>

</div>