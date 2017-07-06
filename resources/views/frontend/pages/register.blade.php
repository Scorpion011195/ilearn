@extends('frontend.layouts.index')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <h1 class="text-center login-title">Đăng kí</h1>
                <div class="account-wall">
                    <form class="form-signin" action="{{ route('dangki') }}" role="form" method="POST" accept-charset="utf-8"">
                    {!! csrf_field() !!} 
                    <div class="form-signin {{ $errors->has('username') ? ' has-error' : '' }}">
                         <input id="username" type="text" class="form-control" name="username" value="{!! old('username') !!}" required autofocus placeholder="Username của bạn">         
                    </div>
                    @if ($errors->has('username'))
                        <div class="alertError">
                            {!! $errors->first('username') !!}
                        </div>
                    @endif
                    <div class="form-signin {{ $errors->has('email') ? ' has-error' : '' }}">
                       <input id="email" type="email" class="form-control" name="email" value="{!! old('email') !!}" required autofocus placeholder="Email của bạn">
                    </div>
                    @if ($errors->has('email'))
                        <div class="alertError">
                            {!! $errors->first('email') !!}
                        </div>
                    @endif
                    <div class="form-signin {{ $errors->has('password') ? ' has-error' : '' }}">
                         <input class="form-control" placeholder="Mật khẩu của bạn" name="password" type="password" value="{{ old('password') }}"/>
                    </div>
                    @if ($errors->has('password'))
                        <div class="alertError">
                        {!! $errors->first('password') !!}
                        </div>
                    @endif
                    <div class="form-signin {{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                        <input id="confirm_password" type="password" class="form-control" name="confirm_password" value="{!! old('confirm_password') !!}" required autofocus placeholder="Nhập lại mật khẩu của bạn">
                    </div>
                    @if ($errors->has('confirm_password'))
                        <div class="alertError">
                        {!! $errors->first('confirm_password') !!}
                        </div>
                    @endif
                        <button class="btn btn-lg btn-primary btn-block" type="submit">
                            Đăng kí
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection