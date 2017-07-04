@extends('backend.ilearn')

@section('content-header')
    <h1>Đổi mật khẩu</h1>
@endsection

@section('content')
    @include('backend.layout.partial.change-password-content')
@endsection

@section('script')
    <script src="{!! asset('js/admin/admin.js') !!}"></script>
@endsection
