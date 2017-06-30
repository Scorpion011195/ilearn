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
    <h1>Quản lý tài khoản</h1>
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
    <script src="{!! asset('js/admin/admin.js') !!}"></script>
    <script src="{!! asset('js/admin/admin-accounts.js') !!}"></script>
@endsection
