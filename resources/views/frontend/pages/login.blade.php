@extends('frontend.layouts.index')
@section('content')
    <div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Đăng nhập</h1>
            <div class="account-wall">
                <form class="form-signin" action="{{ route('dangnhap') }}" role="form" method="POST" accept-charset="utf-8"">
                {!! csrf_field() !!} 
                <div class="form-signin {{ $errors->has('name') ? ' has-error' : '' }}">
                    <input id="name" type="text" class="form-control" name="name" value="{!! old('name') !!}" required autofocus placeholder="Username của bạn">
                </div>
                 @if ($errors->has('name'))
                    <div class="alertError">
                        {!! $errors->first('name') !!}
                    </div>
                @endif
                <div class="form-signin{{ $errors->has('pass') ? ' has-error' : '' }}">
                    <input class="form-control" placeholder="Mật khẩu của bạn" name="pass" type="password" value="{{ old('pass') }}"/>
                </div>
                @if ($errors->has('pass'))
                    <div class="alertError">
                    {!! $errors->first('pass') !!}
                    </div>
                @endif
                    <div class="checkbox pull-right">
                        <input type="checkbox" name="remember" {!! old('remember') ? 'checked' : '' !!}>  <span class="login">Nhớ mật khẩu</span>
                    </div>
                    <div class="form-signin">
                        @if($errors->has('errorLogin'))
                            <div class="form-group">
                                <div class="alertError">
                                    {!! $errors->first('errorLogin') !!}
                                </div>
                            </div>
                        @endif 
                    </div> 
                    <button class="btn btn-lg btn-primary btn-block" type="submit">
                        Đăng nhập</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection