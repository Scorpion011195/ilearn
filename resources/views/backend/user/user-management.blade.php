@extends('backend.ilearn')

@section('title')
    Quản lý tài khoản
@endsection

@section('content-header')
    <h1>Quản lý tài khoản</h1>
@endsection

@section('content')
    @include('backend.layout.partial.user-management-content')
@endsection

@section('script')
    <script src="{!! asset('js/admin/admin.js') !!}"></script>
    <script src="{!! asset('js/admin/admin-accounts.js') !!}"></script>
@endsection
