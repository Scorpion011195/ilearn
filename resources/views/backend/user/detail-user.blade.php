@extends('backend.ilearn')

@section('content-header')
    <h1>Thông tin tài khoản<small>{{ $user->username }}</small></h1>
@endsection

@section('content')
    @include('backend.layout.partial.detail-user-content')
@endsection

@section('script')
    <script src="{!! asset('js/admin/admin-accounts.js') !!}"></script>
@endsection
