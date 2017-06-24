<!doctype html>
<html lang="en">
<?php echo $__env->make('frontend.layout.html_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('frontend.layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('frontend.layout.timkiem', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('frontend.layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('frontend.layout.register', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <script>
            $( document ).ready(function () {
                $( '#create-dict' ).addClass('collapse');
            });
        </script>

        <?php if(isset($flash)): ?>
            <div class='col-md-3'></div>
                <div class="col-md-6">
                    <div class="alert alert-info" id='idsuccess'> 
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>              
                    <h2 align="center"><strong>Well done!</strong> You register successfully.</h2>
                    </div>
                    Click here &nbsp; <a href="javascript:void(0);" onclick="loginToAdd()">Đăng nhập</a> &nbsp; to login
            </div>
        <?php endif; ?>

        <?php if(isset($flag)): ?>
            <div class='col-md-3'></div>
                <div class="col-md-6">
                    <div class="alert alert-warning" id='idsuccess'>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>               
                    <h2 align="center">Dữ liệu đang được cập nhật</h2>
                    </div>
                </div>
                
        <?php endif; ?>
</body>
</html>
