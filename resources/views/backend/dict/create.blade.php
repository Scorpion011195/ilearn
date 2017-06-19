@extends('backend.ilearn')

@section('content-header')
        <h1>
            Thêm từ
            <small>{{ Session::get('user')->username }}</small>
        </h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol> -->
@endsection

@section('content')
    @include('backend.layout.partial.dict-table')
@endsection
