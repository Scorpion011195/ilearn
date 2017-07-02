@extends('backend.ilearn')

@section('content-header')
    <h1>Tra từ</h1>
@endsection

@section('content')
    @include('backend.layout.partial.search-content')
@endsection

@section('script')
    <script src="{!! asset('js/admin/admin.js') !!}"></script>
    <script src="{!! asset('js/admin/admin-search.js') !!}"></script>
@endsection
