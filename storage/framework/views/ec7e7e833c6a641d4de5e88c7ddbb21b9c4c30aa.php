<!doctype html>
<html lang="en">

<?php echo $__env->make('frontend.components.html_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body>
<?php echo $__env->make('frontend.components.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<section class="container margin-top margin-footer">
    <div class="">
        <div class="panel-content">
            <?php echo $__env->make('frontend.components.partial.notification-settings', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class=" text-center">
        </div>
    </div>
</section>
<?php echo $__env->make('frontend.components.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- SET UP EDITABLE -->
</body>
</html>
