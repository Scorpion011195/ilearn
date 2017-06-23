@extends('backend.ilearn')

@section('css')
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"
        rel="stylesheet"/>
        <!-- X EDITABLE CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
        rel="stylesheet"/>
@endsection

@section('content-header')
<h1>
    Thông tin tài khoản
    <small>{{ $user->username }}</small>
</h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol> -->
@endsection

@section('content')
        <div class="panel">
            <div class="panel-body">
                @if(session('alertUpdateDetailUser'))
                    <div class="alert alert-success text-center">
                        {{ session('alertUpdateDetailUser') }}
                    </div>
                @endif

                <form action="{{ route('adminPostDetailUser') }}"  method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_idUser" value="{{ $user->id_user }}">
                    <div class="row">
                        <lable class="control-label col-sm-4 text-center-vertical">Email</lable>
                        <div class="col-sm-8">
                            <input type="text" name="profile-email" class="form-control" readonly value="{{
                             $user->email
                            }}">
                        </div>
                    </div>

                    <div class="row margin-top">
                        <lable class="control-label col-sm-4 text-center-vertical">Tên</lable>
                        <div class="col-sm-8">
                            <input type="text" name="profile-name" class="form-control" value="{{ $userInformation->name }}">
                        </div>
                    </div>

                    <div class="row margin-top">
                        <lable class="control-label col-sm-4 text-center-vertical">Địa chỉ</lable>
                        <div class="col-sm-8">
                            <input type="text" name="profile-address" class="form-control" value="{{ $userInformation->address }}">
                        </div>
                    </div>

                    <div class="row margin-top">
                        <lable class="control-label col-sm-4 text-center-vertical">Số điện thoại</lable>
                        <div class="col-sm-8">
                            <input type="text" name="profile-phone" class="form-control" value="{{ $userInformation->phone }}">
                        </div>
                    </div>

                    <div class="row margin-top">
                        <lable class="control-label col-sm-4 text-center-vertical">Ngày sinh</lable>
                        <div class="col-sm-8">
                            <input type="date" name="profile-dob" class="form-control" id="profile-dob" value="{{ $userInformation->date_of_birth }}">
                        </div>
                    </div>

                    <div class="row text-center">
                        <input type="submit" class="btn btn-info margin-top text-center" value="Cập nhật">
                    </div>

                </form>
            </div>
@endsection

@section('script')
        <!-- Active left menu -->
        <script>
            $(document).ready(function(){
                    $('#_menu-qltk').addClass("active");
            });
        </script>
        <!-- /.Active left menu -->

@endsection
