<!doctype html>
<html lang="en">

<?php echo $__env->make('frontend.layout.html_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"
      rel="stylesheet"/>
<!-- X EDITABLE CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
      rel="stylesheet"/>
<!-- X-EDITABLE JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<?php echo $__env->make('frontend.layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<section class="container margin-top margin-footer">
    <div class="">
        <div class="panel-content">
            <?php echo $__env->make('frontend.layout.notification-settings', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
    <script>
        $(document).ready(function() {
            $.fn.editable.defaults.mode = 'inline';
            $(document).ready(function() {
                $(' td ').editable();
            });
            $('#username').editable({
                type: 'text',
                pk: 1,
                url: '/post',
                title: 'Enter username'
            });
            var table = $('#example').DataTable();

            $('#example tbody').on('click', 'tr', function () {
                var data = table.row( this ).data();
                alert( 'You clicked on '+data[0]+'\'s row' );
            } );
        } );
    </script>
</body>
</html>