@extends('backend.layouts.ilearn')

@section('title')
    Thêm từ
@endsection

@section('content-header')
    <h1>Thêm từ</h1>
@endsection

@section('content')
    @include('backend.components.dict.create.create-content')
@endsection

@section('script')
    <script src="{!! asset('js/admin/admin.js') !!}"></script>
    <script src="{!! asset('js/admin/admin-add.js') !!}"></script>
@endsection

