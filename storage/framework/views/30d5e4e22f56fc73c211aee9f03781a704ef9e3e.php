<?php $__env->startSection('css'); ?>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"
        rel="stylesheet"/>
        <!-- X EDITABLE CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
        rel="stylesheet"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-header'); ?>
<h1>
    Quản lý tài khoản
    <!-- <small><?php echo e(Session::get('user')->username); ?></small> -->
</h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol> -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="panel">
            <div class="panel-body">
                <?php echo Form::open(['route' => 'adminSearchUser','method' => 'get']); ?>

                <div class="row">
                    <div class="col-sm-5">
                        <?php echo e(csrf_field()); ?>

                        <?php echo Form::label('collect-phrase', 'Tài khoản', ['class' => ' control-label col-sm-4 text-center-vertical text-right']); ?>

                        <div class="col-sm-8">
                            <?php echo Form::text('_keytaikhoan', '', ['class' => 'form-control']); ?>

                        </div>
                        <!-- <div class="col-sm-1">
                            <?php echo e(Form::button('<span class="glyphicon glyphicon-search"></span>',array('class'=>'btn btn-info','type'=>'submit'))); ?>

                        </div> -->
                    </div>
                    <div class="col-sm-5">
                        <?php echo Form::label('collect-date', 'Ngày đăng ký', ['class' => ' control-label col-sm-4 text-center-vertical text-right']); ?>

                        <div class="col-sm-8">
                        <?php echo Form::date('_keyngaydk', '', ['class' => 'form-control', 'id' => 'collect-date']); ?>

                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="col-sm-3">
                            <?php echo e(Form::button('<span class="glyphicon glyphicon-search"></span>',array('class'=>'btn btn-info','type'=>'submit'))); ?>

                        </div>
                    </div>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
        <div class="panel">
            <div class="panel-body">
                <?php echo $__env->make('backend.layout.partial.account-table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
        <!-- Update status -->
        <script>
            $(document).ready(function(){
                $(document).on('change', '.choose-status' , function(E){
                    var idUser = $(this).closest('tr').find('._user-id').attr('data-id');
                    var idStatus = $(this).val();

                    var _token = $('input[name=_token]').val();
                    //console.log(_token);
                    $.ajax({
                        url:'status',
                        method: 'POST',
                        data : {'idUser': idUser, 'idStatus' : idStatus, '_token' : _token},
                        dataType:'json',
                        success : function(data){
                            // $("#_idStatus"+idStatus).html(data);
                        },
                    });
                });
            });
        </script>
        <!-- /.Update status -->

        <!-- Update role -->
        <script>
            $(document).ready(function(){
                $(document).on('change', '.choose-role' , function(E){
                    var idUser = $(this).closest('tr').find('._user-id').attr('data-id');
                    var idRole = $(this).val();
                    var _token = $('input[name=_token]').val();
                    //console.log(_token);
                    $.ajax({
                        url:'role',
                        method: 'POST',
                        data : {'idUser': idUser, 'idRole' : idRole, '_token' : _token},
                        dataType:'json',
                        success : function(data){
                            // $("#_idRole"+idRole).html(data);
                        },
                    });
                });
            });
        </script>
        <!-- /.Update role -->

        <!-- Confirm delete User -->
        <script>
            $(document).ready(function(){
                $("a._delete-user").on('click', function(E){
                    var _element = $(this);
                    var idUser = $(this).closest('tr').find('._user-id').attr('data-id');
                    var _token = $('input[name=_token]').val();

                    if(!confirm('Bạn có muốn xóa tài khoản này?')){
                        e.preventDefault();
                        return false;
                    }
                    else{
                        $.ajax({
                            url:'delete',
                            method: 'POST',
                            data : {'idUser': idUser, '_token' : _token},
                            dataType:'json',
                            success : function(response){
                                    _element.closest('tr').remove();
                            },
                            error: function(xhr, error) {
                               console.log(error);
                            }
                        });
                        //$(this).closest('tr').remove();
                    }
                });
            });
        </script>
        <!-- /.Confirm delete User -->

        <!-- script toltip -->
        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
        <!-- /.script tootip -->

        <!-- Active left menu -->
        <script>
            $(document).ready(function(){
                    $('#_menu-qltk').addClass("active");
            });
        </script>
        <!-- /.Active left menu -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.ilearn', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>