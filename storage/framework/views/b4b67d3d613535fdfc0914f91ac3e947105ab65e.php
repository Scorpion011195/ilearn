<?php $__env->startSection('content-header'); ?>
        <h1>
            Thống kê
            <small><?php echo e(Session::get('user')->username); ?></small>
        </h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol> -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"
          rel="stylesheet"/>
    <!-- X EDITABLE CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
          rel="stylesheet"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <!-- X-EDITABLE JS -->
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
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

            $(function() {
                $( "#collect-date" ).datepicker();
            });
        } );
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="panel">
        <div class="panel-body">
            <?php echo Form::open(); ?>

                <div class="row">
                    <div class="col-sm-4">
                        <?php echo Form::label('collect-phrase', 'Từ', ['class' => ' control-label col-sm-4 text-center-vertical']); ?>

                        <div class="col-sm-8">
                            <?php echo Form::text('collect-phrase', '', ['class' => 'form-control']); ?>

                        </div>
                    </div>

                    <div class="col-sm-4">
                        <?php echo Form::label('collect-phrase', 'Nguồn', ['class' => ' control-label col-sm-4 text-center-vertical']); ?>

                        <div class="col-sm-8">
                            <?php echo Form::select('collect-source', ['1' => 'Anh', '2'=>'Viet'], '', ['class' => 'form-control']); ?>

                        </div>
                    </div>

                    <div class="col-sm-4">
                        <?php echo Form::label('collect-phrase', 'Đích', ['class' => ' control-label col-sm-4 text-center-vertical']); ?>

                        <div class="col-sm-8">
                            <?php echo Form::select('collect-dest', ['1' => 'Anh', '2'=>'Viet'], '', ['class' => 'form-control']); ?>

                        </div>
                    </div>
                </div>
                <div class="row margin-top">
                    <div class="col-sm-4">
                        <?php echo Form::label('collect-date', 'Thời gian', ['class' => ' control-label col-sm-4 text-center-vertical']); ?>

                        <div class="col-sm-8">
                            <?php echo Form::text('collect-date', '', ['class' => 'form-control', 'id' => 'collect-date']); ?>

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <?php echo Form::submit('Tìm kiếm', ['class' => 'form-control btn btn-success']); ?>

                    </div>

                    <div class="col-sm-4">
                        <?php echo Form::submit('Tìm kiếm tất cả', ['class' => 'form-control btn btn-primary']); ?>

                    </div>
                </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
    <div class="panel">
        <div class="panel-body">
            <?php echo $__env->make('backend.layout.partial.dict-table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.ilearn', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>