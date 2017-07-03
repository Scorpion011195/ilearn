@extends('backend.ilearn')

@section('title')
    Thống kê
@endsection

@section('content-header')
    <h1>Thống kê</h1>
@endsection

@section('content')
    @include('backend.layout.partial.collect-content')
@endsection

@section('script')
    <script src="{!! asset('js/admin/admin.js') !!}"></script>
    <script src="{!! asset('js/admin/admin-statistic.js') !!}"></script>
@endsection
