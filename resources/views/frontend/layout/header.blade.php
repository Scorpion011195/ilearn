
<body onload="loadFn()">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="header_top"></div>
    <script>
        function loadFn() {
        @if ($errors -> has('username') || $errors -> has('email') || $errors -> has('password') || $errors -> has('confirm_password'))
                document.getElementById('idXXX').click();
        @endif
        }
    </script>
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
                        <a id="closepage" menuid="0" class="brand" href="#" followlink="true">
                            LOGO</a>

                    </div>
                    <div class="collapse navbar-collapse pull-right" id="main-menu">
                        <ul class="nav">

                            @if(Auth::guest())

                            {!! Form::open(array('route' => 'dangnhap', 'class' => 'brand-btn', 'id' => 'nav-form-login', 'form' => '1') )!!}

                                @if($errors->has('errorLogin'))
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        {{$errors->first('errorLogin')}}
                                    </div>
                                @endif

                            <div class="form-inline row">
                                {!! Form::text('username', Illuminate\Support\Facades\Input::old('username'), ['class' => 'form-control nav-login collapse', 'placeholder' => 'Tên đăng nhập']) !!}

                                {{ Form::password('password', array('class' => 'form-control nav-login collapse','placeholder' => 'Mật khẩu')) }}
                                
                                <input class= "nav-login" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>  <span class="nav-login">Remember</span>

                                {!! Form::button('Đăng nhập', ['class' => 'btn btn-default', 'id' => 'nav-login-btn', 'onclick' => 'doSubmit()']) !!}

                                <a class="nav-login collapse" data-toggle="modal" href="#modal-register">Đăng ký</a>
                            </div>
                            {!! Form::close() !!}

                            @else

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>

                        @endif
                        </ul>
                    </div>
                    </header>

                </div><!--menu-->

               



