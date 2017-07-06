<meta name="csrf-token" content="{!! csrf_token() !!}">
    <nav class="navbar navbar">
        <div class="container">
            @if(Auth::guest())
            <ul class="nav navbar-nav">
              <li><a href="{{ url('/') }}">Trang chủ</a></li>
              <!-- <li><a href="{{ url('note')}}">Lịch sử</a></li>
              <li><a href="{{ url ('note')}}">Cài đặt</a></li> -->             
            </ul>
            <ul class="nav navbar-nav navbar-right">
                {!! Form::open(array('route' => 'dangnhap', 'class' => 'brand-btn', 'id' => 'nav-form-login', 'form' => '1') )!!}

                <div class="form-inline row">
                    {!! Form::text('name', Illuminate\Support\Facades\Input::old('name'), ['class' => 'form-control nav-login collapse', 'placeholder' => 'Tên đăng nhập', 'required']) !!}

                    <input class="form-control nav-login collapse" placeholder="Mật khẩu của bạn" name="pass" type="password" value="{{ old('pass') }}"/>

                    <input class= "nav-login" type="checkbox" name="remember" {!! old('remember') ? 'checked' : '' !!}>  <span class="nav-login">Remember</span>
                    {!! Form::button('Đăng nhập', ['class' => 'btn btn-default', 'id' => 'nav-login-btn', 'onclick' => 'doSubmit()']) !!}

                    <a class="nav-login collapse" id="idXXX" data-toggle="modal" href="#modal-register">Đăng ký</a>
                </div>
                {!! Form::close() !!}
            </ul>
            @else
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}">Trang chủ</a></li>
                    <li><a href="{{ url('/historys') }}">Lịch sử</a></li>
                    <li><a href="{{ url('/settings') }}">Cài đặt</a></li>             
                </ul>
                <ul class="nav navbar-nav navbar-right">
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
                </ul>
            @endif
        </div>
    </nav>
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

