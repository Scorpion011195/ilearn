<!doctype html>
<html lang="en">
<?php echo $__env->make('frontend.layout.html_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('frontend.layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('frontend.layout.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('frontend.layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('frontend.layout.register', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <script>
            $( document ).ready(function () {
                $( '#create-dict' ).addClass('collapse');
            });
        </script>
</body>
</html>