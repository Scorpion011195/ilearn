<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"
          rel="stylesheet"/>
    <!-- X EDITABLE CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
          rel="stylesheet"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-header'); ?>
    <h1>Thống kê</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="panel">
        <div class="panel-body">
            <div class="row">
              <div class="col-sm-12">
                <form class="form-inline" action="<?php echo e(utf8_encode(route('adminDictCollectByCondition'))); ?>" method="post">
                    <input type="hidden" name="_token" value="<?php echo e(utf8_encode(csrf_token())); ?>">
                    <div class="form-group">
                      <div class="input-group ">
                        <span class="input-group-addon">Tình trạng</span>
                        <select class="form-control" name="_condition">
                            <?php $__currentLoopData = $listSearch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option
                                <?php if($value == $cbTypeWord): ?>
                                    <?php echo "selected"; ?>

                                <?php endif; ?>
                            ><?php echo $value; ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-info">
                          <span class="glyphicon glyphicon-search"></span>
                      </button>
                    </div>
                </form>
              </div>
            </div>
            <br>
            <?php echo $__env->make('backend.layout.partial.collect-table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo asset('js/admin/admin.js'); ?>"></script>
    <script src="<?php echo asset('js/admin/admin-statistic.js'); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.ilearn', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>