
<html lang="en">

<?php echo $__env->make('frontend.layout.html_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body>
<?php echo $__env->make('frontend.layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<section class="container margin-top margin-footer">
    <div class="">
        <div class="panel-content">
            <?php echo $__env->make('frontend.layout.create-dict', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class=" text-center">
            <?php echo $__env->make('frontend.layout.partial.settings-table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
</section>
<?php echo $__env->make('frontend.layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('frontend.layout.footer-script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('frontend.layout.register', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- SET UP EDITABLE -->
<!-- <script>
    
</script> -->
</body>
</html>