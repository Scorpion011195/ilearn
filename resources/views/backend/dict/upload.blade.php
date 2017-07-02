@extends('backend.ilearn')

@section('content-header')
    <h1>Thêm file csv</h1>
@endsection

@section('content')
    @include('backend.layout.partial.upload-content')
@endsection

@section('script')
    <script src="{!! asset('js/admin/admin-upload.js') !!}"></script>
@endsection
