<?php $__env->startSection('title'); ?>
    Thêm từ
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-header'); ?>
    <h1>Thêm từ</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('backend.layout.partial.create-content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo asset('js/admin/admin.js'); ?>"></script>
    <script src="<?php echo asset('js/admin/admin-add.js'); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.ilearn', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
