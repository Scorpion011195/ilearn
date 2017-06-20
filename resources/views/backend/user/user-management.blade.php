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
    <small>{{ Session::get('user')->username }}</small>
</h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol> -->
@endsection

@section('content')
        <div class="panel">
            <div class="panel-body">
                {!! Form::open() !!}
                <div class="row">
                    <div class="col-sm-6">
                        {!! Form::label('collect-phrase', 'Tài khoản', ['class' => ' control-label col-sm-3 text-center-vertical']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('collect-phrase', '', ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-1">
                            {{ Form::button('<span class="glyphicon glyphicon-search"></span>',array('class'=>'btn btn-info','type'=>'submit'))}}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('collect-date', 'Thời gian', ['class' => ' control-label col-sm-3 text-center-vertical']) !!}
                        <div class="col-sm-6">
                        {!! Form::text('collect-date', '', ['class' => 'form-control', 'id' => 'collect-date']) !!}
                        </div>
                        <div class="col-sm-1">
                        {{ Form::button('<span class="glyphicon glyphicon-search"></span>',array('class'=>'btn btn-info','type'=>'submit'))}}
                        </div>
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

        <!-- script toltip -->
        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
        <!-- /.script tootip -->
@endsection
