<?php $__env->startSection('content-header'); ?>
        <h1>
            Thêm file scv
            <small><?php echo e(Session::get('user')->username); ?></small>
        </h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol> -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"
          rel="stylesheet"/>
    <!-- X EDITABLE CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
          rel="stylesheet"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <!-- X-EDITABLE JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="panel">
        <div class="panel-body">
            <?php echo Form::open(); ?>

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

    <div class="panel">
        <div class="panel-body">
            <?php echo $__env->make('backend.layout.partial.dict-table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.ilearn', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>