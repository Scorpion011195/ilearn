@extends('frontend.layouts.index')
@section('content')
@include('frontend.components.search')
	@if(isset($flash))
        <div class='col-md-3'></div>
            <div class="col-md-6">
                <div class="alert alert-info" id='idsuccess'> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>              
                <h2 align="center"><strong>Well done!</strong> You register successfully.</h2>
                </div>
                Click here &nbsp; <a href="{{ url('dangnhap') }}">Đăng nhập</a> &nbsp; để đăng nhập
        </div>
    @endif

    @if(isset($flag))
        <div class='col-md-3'></div>
            <div class="col-md-6">
                <div class="alert alert-warning" id='idsuccess'>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>               
                <h2 align="center">Dữ liệu đang được cập nhật</h2>
                </div>
            </div>
            
    @endif
@endsection