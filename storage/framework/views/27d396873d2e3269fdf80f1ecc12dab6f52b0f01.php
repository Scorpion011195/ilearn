
<html lang="en">

<?php echo $__env->make('frontend.components.html_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body>
<?php echo $__env->make('frontend.components.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<section class="container margin-top margin-footer">
    <div class="">
        <div class="panel-content">
            <?php echo $__env->make('frontend.components.partial.create-dict', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class=" text-center">
            <?php echo $__env->make('frontend.layout.partial.settings-table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
</section>
<?php echo $__env->make('frontend.components.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('frontend.components.footer-script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- SET UP EDITABLE -->
<!-- <script>
    
</script> -->
</body>
</html>