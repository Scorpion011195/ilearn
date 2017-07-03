<?php $__env->startSection('title'); ?>
    Thêm từ
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-header'); ?>
        <h1>
            Thêm từ
            <!-- <small><?php echo e(Session::get('user')->username); ?></small> -->
        </h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol> -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('backend.layout.partial.create-content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo asset('js/admin/admin.js'); ?>"></script>
    <script src="<?php echo asset('js/admin/admin-add.js'); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.ilearn', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
