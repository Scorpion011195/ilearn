@extends('frontend.layouts.index')
@section('content')
<div class="row page">
    <div id="view1" class="col-md-6 col-lg-6 col-xs-12"> 
        <ui-view name="main" class="ng-scope">
            <div class="col-md-12 register-screen ng-scope">
                <form name="loginRegister" action="{{ route('dangki') }}" role="form" method="POST" accept-charset="utf-8">
                {!! csrf_field() !!} 
                    <legend>Đăng ký tài khoản mới</legend>
                    <label class="control-label">
                        Username:
                    </label>
                    <div class="input-group {{ $errors->has('username') ? ' has-error' : '' }}">
                        <input id="username" type="text" class="form-control" name="username" value="{!! old('username') !!}" required autofocus placeholder="Tên đăng nhập của bạn">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    </div>
                    @if ($errors->has('username'))
                        <div class="text-danger ng-hide">
                            <span><i class="fa fa-times text-danger"></i>{!! $errors->first('username') !!}</span>
                        </div>
                    @endif
                    <br>  
                    <label class="control-label">
                        Email:
                    </label>
                    <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" name="email" value="{!! old('email') !!}" required autofocus placeholder="Email của bạn">
                        <span class="input-group-addon">@</span>
                    </div>
                    @if ($errors->has('email'))
                        <div class="text-danger ng-hide">
                            <span><i class="fa fa-times text-danger"></i>{!! $errors->first('email') !!}</span>
                        </div>
                    @endif
                    <br>     
                    <label class="control-label">
                        Mật khẩu:
                    </label>
                    <div class="input-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu của bạn" minlength="6" maxlength="32" required="">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    </div>
                    @if ($errors->has('password'))
                        <div class="text-danger ng-hide">
                            <span><i class="fa fa-times text-danger"></i>{!! $errors->first('password') !!}</span>
                        </div>
                    @endif
                 <br>
                    <label class="control-label">
                        Nhập lại mật khẩu:
                    </label>
                    <div class="input-group {{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                        <input id="confirm_password" type="password" class="form-control" name="confirm_password" value="{!! old('confirm_password') !!}" required autofocus placeholder="Nhập lại mật khẩu của bạn">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    </div>
                    @if ($errors->has('confirm_password'))
                        <div class="alertError">
                        {!! $errors->first('confirm_password') !!}
                        </div>
                    @endif
                    <br>
                    <div class="input-group">
                        <button class="btn btn-info btn-register" type="submit" >
                            Đăng ký
                        </button>
                        <a class="btn btn-link" href="{{url('dangnhap')}}">
                            Quay lại đăng nhập
                        </a>
                    </div>    
                </form>
            </div>
        </ui-view>
    </div>
    <div id="view2" class="col-md-6 col-lg-6 col-xs-12">
        <ui-view name="right" class="ng-scope">
            <div class="col-md-12 register-screen ng-scope">
              <h3>Điều khoản sử dụng</h3>
              <p>Với việc sử dụng ILEARN, bao gồm phiên bản trình duyệt và các phiên bản dành cho điện thoại di động, bạn đồng ý chấp nhận các điều khoản nêu dưới đây. Những điều khoảng này có hiệu lực ngay khi bạn lần đầu tiên dùng Ilearn.</p>

              <p class="title">Sử dụng ILEARN</p>
              <p>Bạn đồng ý dùng ILEARN chỉ với mục đích hỗ trợ, tham khảo và không xâm phạm quyền, giới hạn hoặc ngăn cấm người khác sử dụng Ilearn.</p>
            </div>
        </ui-view>
    </div>
<div id="view3" class="">
  <ui-view name="right2" class="ng-scope"></ui-view>
</div>
</div>
@endsection