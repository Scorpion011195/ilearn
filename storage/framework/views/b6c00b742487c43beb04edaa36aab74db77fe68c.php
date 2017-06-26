<?php $__env->startSection('css'); ?>
    <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"
          rel="stylesheet"/>
    <!-- X EDITABLE CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
          rel="stylesheet"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-header'); ?>
        <h1>
            Thêm file scv
            <!-- <small><?php echo e(utf8_encode(Session::get('user')->username)); ?></small> -->
        </h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol> -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="panel">
        <div class="panel-body">
            <?php echo Form::open(array('enctype' => 'multipart/form-data', 'files' =>true, 'accept-charset' => 'utf-8')); ?>

            <div class="panel-content">
                <?php echo Form::label('csv-file', 'Tải lên file csv'); ?>

                <?php echo Form::file('csv-file', ['class' => 'btn btn-default']); ?>

            </div>
        </div>
        <div class="panel-footer">
            <?php echo Form::submit('Duyệt file', ['class' => 'btn btn-default']); ?>

        </div>
        <?php echo Form::close(); ?>

    </div>

    <?php if(isset($info)): ?>
        <div class='col-md-3'></div>
            <div class="col-md-6">
                <div class="alert alert-info" id='idsuccess'>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>               
                <h2 align="center">Upload file successfully</h2>
                </div>
            </div>
    <?php endif; ?>
    
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.ilearn', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>