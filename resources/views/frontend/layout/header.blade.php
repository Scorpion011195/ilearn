<meta name="csrf-token" content="{!! csrf_token() !!}">
<div class="header_top"></div>
<div class="menu">
    <header class="container">
        <div class="navbar navbar-inner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="{{ url('/') }}"><img src="https://ilearn.co.za/wp-content/uploads/2015/11/ilearn_logo_300.png" alt="" height="50px" width=90px></a>
                </div>
                <div class="collapse navbar-collapse pull-right" id="main-menu">
                    <ul class="nav">

                        @if(Auth::guest())

                        {!! Form::open(array('route' => 'dangnhap', 'class' => 'brand-btn', 'id' => 'nav-form-login', 'form' => '1') )!!}

                        <div class="form-inline row">
                            {!! Form::text('username', Illuminate\Support\Facades\Input::old('username'), ['class' => 'form-control nav-login collapse', 'placeholder' => 'Tên đăng nhập']) !!}

                            <input class="form-control nav-login collapse" placeholder="Mật khẩu của bạn" name="password" type="password" value="{{ old('password') }}"/>

                            <input class= "nav-login" type="checkbox" name="remember" {!! old('remember') ? 'checked' : '' !!}>  <span class="nav-login">Remember</span>

                            {!! Form::button('Đăng nhập', ['class' => 'btn btn-default', 'id' => 'nav-login-btn', 'onclick' => 'doSubmit()']) !!}

                            <a class="nav-login collapse" id="idXXX" data-toggle="modal" href="#modal-register">Đăng ký</a>
                        </div>
                        {!! Form::close() !!}

                        @else

                        <li class="dropdown">
                            <a href="{{ url('/') }}">Trang chủ</a>
                        </a>
                    </li>
                    <li class="dropdown">  <a href="{{ url('/historys') }}">Lịch sử</a>
                    </a></li>
                    <li class="dropdown">  <a href="{{ url('/settings') }}">Cài đặt</a>
                    </a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{!! route('logout') !!}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{!! route('logout') !!}" method="POST" style="display: none;">
                                {!! csrf_field() !!}
                            </form>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </header>
</div><!--menu-->
    
    @if($errors->has('errorLogin'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {!! $errors->first('errorLogin') !!}
        </div>
    @endif
<script type="text/javascript">
   $( document ).ready(function() {
        @if (($errors -> has('username') || $errors -> has('email') || $errors -> has('password') || $errors -> has('confirm_password')))
        document.getElementById('idXXX').click();
        @endif   
});
</script>

