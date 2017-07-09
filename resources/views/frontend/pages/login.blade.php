@extends('frontend.layouts.index')
@section('content')
<div class="row page">
    <div id="view1" class="col-md-6 col-lg-6 col-xs-12">
        <ui-view name="main" class="ng-scope">
            <div class="col-md-12 register-screen ng-scope">
                <form name="loginRegister" action="{{ route('dangnhap') }}" role="form" method="POST" accept-charset="utf-8">
                {!! csrf_field() !!}
                    <legend>Đăng nhập</legend>
                    <label class="control-label">
                        Username:
                    </label>
                    <div class="input-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <input id="name" type="text" class="form-control" name="name" value="{!! old('name') !!}" required minlength="6" maxlength="32" autofocus placeholder="Tên đăng nhập của bạn">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    </div>
                    @if ($errors->has('name'))
                        <div class="text-danger ng-hide">
                            <span><i class="fa fa-times text-danger"></i>{!! $errors->first('name') !!}</span>
                        </div>
                    @endif
                    <br>
                    <label class="control-label">
                        Mật khẩu:
                    </label>
                    <div class="input-group {{ $errors->has('pass') ? ' has-error' : '' }}">
                        <input type="password" name="pass" class="form-control" placeholder="Mật khẩu của bạn" minlength="6" maxlength="32" required="">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    </div>
                    @if ($errors->has('pass'))
                        <div class="text-danger ng-hide">
                            <span><i class="fa fa-times text-danger"></i>{!! $errors->first('pass') !!}</span>
                        </div>
                    @endif
                 <br>
                 <div class="input-group">
                        @if($errors->has('errorLogin'))
                            <div class="form-group">
                                <div class="text-danger ng-hide">
                                    {!! $errors->first('errorLogin') !!}
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {!! old('remember') ? 'checked' : '' !!}>
                            Nhớ mật khẩu
                        </label>
                    </div>
                    <div class="input-group">
                        <button class="btn btn-info btn-register" type="submit" >
                            Đăng nhập
                        </button>
                        <a class="btn btn-link" href="{{url('dangki')}}">
                            Đăng ký tài khoản mới
                        </a>
                    </div>
                </form>
            </div>
        </ui-view>
    </div>
    <div id="view2" class="col-md-6 col-lg-6 col-xs-12">
        <ui-view name="right" class="ng-scope">
            <div class="col-md-12 register-screen ng-scope">
              <h3>Đăng nhập Ilearn</h3>
              <p class="title">Để hưởng nhiều tiện ích khác</p>
              <p>1. Cài đặt và nhận thông báo </p>
              <p>2. Chỉnh sửa từ cho riêng bạn</p>
              <p>3. Thêm từ vào lịch sử của bạn</p>
              <p>4. Xem lịch sử từ của bạn</p>
              <p>5. Xóa từ trong lịch sử của bạn</p>
             </div>
            </div>
        </ui-view>
    </div>
</div>
@endsection
