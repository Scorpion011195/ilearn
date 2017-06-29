@extends('backend.ilearn')

@section('css')
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"
        rel="stylesheet"/>
        <!-- X EDITABLE CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
        rel="stylesheet"/>
@endsection

@section('content-header')
<h1>
    Quản lý tài khoản
    <!-- <small>{{ Session::get('user')->username }}</small> -->
</h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol> -->
@endsection

@section('content')
        <div class="panel">
            <div class="panel-body">
                {!! Form::open(['route' => 'adminSearchUser','method' => 'get']) !!}
                <div class="row">
                    <div class="col-sm-5">
                        {!! csrf_field() !!}
                        {!! Form::label('collect-phrase', 'Tài khoản', ['class' => ' control-label col-sm-4 text-center-vertical text-right']) !!}
                        <div class="col-sm-8 {!! $errors->has('_keytaikhoan') ? ' has-error' : '' !!}">
                            {!! Form::text('_keytaikhoan', '', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-sm-5">
                        {!! Form::label('collect-date', 'Ngày đăng ký', ['class' => ' control-label col-sm-4 text-center-vertical text-right']) !!}
                        <div class="col-sm-8 {!! $errors->has('_keyngaydk') ? ' has-error' : '' !!}" id="datetimepicker">
                        {!! Form::date('_keyngaydk', '', ['class' => 'form-control', 'id' => 'collect-date']) !!}
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="col-sm-3">
                            {!! Form::button('<span class="glyphicon glyphicon-search"></span>',array('class'=>'btn btn-info','type'=>'submit')) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-sm-5">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-8">
                      @if ($errors->has('_keytaikhoan'))
                        <div class="{{ $errors->has('_keytaikhoan') ? ' has-error' : '' }}">
                            <p class="help-block"><span class="glyphicon glyphicon-warning-sign"></span>   <strong>{!! $errors->first('_keytaikhoan') !!}</strong></p>
                        </div>
                      @endif
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-8">
                      @if ($errors->has('_keyngaydk'))
                        <div class="{{ $errors->has('_keyngaydk') ? ' has-error' : '' }}">
                            <p class="help-block"><span class="glyphicon glyphicon-warning-sign"></span>   <strong>{!! $errors->first('_keyngaydk') !!}</strong></p>
                        </div>
                      @endif
                    </div>
                  </div>
                  <div class="col-sm-2">
                  </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="panel">
            <div class="panel-body">
                @include('backend.layout.partial.account-table')
            </div>
        </div>
@endsection

@section('script')
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
@endsection
