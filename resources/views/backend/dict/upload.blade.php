@extends('backend.ilearn')

@section('css')
    <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"
          rel="stylesheet"/>
    <!-- X EDITABLE CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
          rel="stylesheet"/>
@endsection

@section('content-header')
    <h1>Thêm file scv</h1>
@endsection

@section('content')
    <div class="panel">
        <div class="panel-body">
            {!! Form::open(array('enctype' => 'multipart/form-data', 'files' =>true, 'accept-charset' => 'utf-8')) !!}
            <div class="panel-content">
                {!! Form::label('csv-file', 'Tải lên file csv') !!}
                {!! Form::file('csv-file', ['class' => 'btn btn-default']) !!}
            </div>
        </div>
        <div class="panel-footer">
            {!! Form::submit('Duyệt file', ['class' => 'btn btn-default']) !!}
        </div>
        {!! Form::close() !!}
    </div>

    @if(isset($info))
        <div class='col-md-3'></div>
            <div class="col-md-6">
                <div class="alert alert-info" id='idsuccess'>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h2 align="center">Upload file successfully</h2>
                </div>
            </div>
    @endif
@endsection

@section('script')
    <script src="{!! asset('js/admin/admin-upload.js') !!}"></script>
@endsection
