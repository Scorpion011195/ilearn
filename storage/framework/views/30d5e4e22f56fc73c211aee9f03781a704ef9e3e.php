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
    <!-- <small><?php echo e(utf8_encode(Session::get('user')->username)); ?></small> -->
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
                        <?php echo csrf_field(); ?>

                        <?php echo Form::label('collect-phrase', 'Tài khoản', ['class' => ' control-label col-sm-4 text-center-vertical text-right']); ?>

                        <div class="col-sm-8 <?php echo $errors->has('_keytaikhoan') ? ' has-error' : ''; ?>">
                            <?php echo Form::text('_keytaikhoan', '', ['class' => 'form-control']); ?>

                        </div>
                    </div>
                    <div class="col-sm-5">
                        <?php echo Form::label('collect-date', 'Ngày đăng ký', ['class' => ' control-label col-sm-4 text-center-vertical text-right']); ?>

                        <div class="col-sm-8 <?php echo $errors->has('_keyngaydk') ? ' has-error' : ''; ?>" id="datetimepicker">
                        <?php echo Form::date('_keyngaydk', '', ['class' => 'form-control', 'id' => 'collect-date','min'=>'1900-01-01']); ?>

                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="col-sm-3">
                            <?php echo Form::button('<span class="glyphicon glyphicon-search"></span>',array('class'=>'btn btn-info','type'=>'submit')); ?>

                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-sm-5">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-8">
                      <?php if($errors->has('_keytaikhoan')): ?>
                        <div class="<?php echo e(utf8_encode($errors->has('_keytaikhoan') ? ' has-error' : '')); ?>">
                            <p class="help-block"><span class="glyphicon glyphicon-warning-sign"></span>   <strong><?php echo $errors->first('_keytaikhoan'); ?></strong></p>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-8">
                      <?php if($errors->has('_keyngaydk')): ?>
                        <div class="<?php echo e(utf8_encode($errors->has('_keyngaydk') ? ' has-error' : '')); ?>">
                            <p class="help-block"><span class="glyphicon glyphicon-warning-sign"></span>   <strong><?php echo $errors->first('_keyngaydk'); ?></strong></p>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-sm-2">
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
                    var userName = $(this).closest('tr').find('._user-name').text();
                    var _token = $('input[name=_token]').val();

                    $.ajax({
                        url:'status',
                        method: 'POST',
                        data : {'idUser': idUser, 'idStatus' : idStatus, '_token' : _token},
                        dataType:'json',
                        success : function(response){
                            if(response['data'] == "OK"){
                              alert('Bạn đã cập nhật "Tình trạng" của tài khoản "'+userName+'"');
                            }
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
                    var userName = $(this).closest('tr').find('._user-name').text();
                    var _token = $('input[name=_token]').val();

                    $.ajax({
                        url:'role',
                        method: 'POST',
                        data : {'idUser': idUser, 'idRole' : idRole, '_token' : _token},
                        dataType:'json',
                        success : function(response){
                            if(response['data'] == "OK"){
                              alert('Bạn đã cập nhật "Quyền" của tài khoản "'+userName+'"');
                            }
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
                    var userName = $(this).closest('tr').find('._user-name').text();
                    var _token = $('input[name=_token]').val();

                    if(!confirm('Bạn có muốn xóa tài khoản "'+userName+'"?')){
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
                                if(response['data'] == "OK"){
                                  _element.closest('tr').remove();
                                  alert('Bạn đã xóa tài khoản "'+userName+'"');
                                }
                            },
                            error: function(xhr, error) {
                               console.log(error);
                            }
                        });
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