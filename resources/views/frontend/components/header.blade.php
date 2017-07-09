<meta name="csrf-token" content="{!! csrf_token() !!}">
<nav class="navbar navbar-fixed-top">
    <div class="container-fluid">
        @if(Auth::guest())
        <ul class="nav navbar-nav">
          <li><a href="{{ url('/') }}">Trang chủ</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right margin--right-5-px">
            <li><a href="{{ url('dangnhap') }}">Đăng nhập</a></li>
            <li><a class="nav collapse" data-toggle="model" href="{{ url('dangki') }}">Đăng kí</a></li>
        </ul>
        @else
        <ul class="nav navbar-nav">
            <li><a href="{{ url('/') }}">Trang chủ</a></li>
            <li><a href="{{ url('/historys') }}">Lịch sử</a></li>
            <li><a href="{{ url('/settings') }}">Cài đặt</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right margin--right-5-px">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" id='keep-push-name'>
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
        <input type="hidden" name="ss-push" value="{{ Session::get('statusPushNotification') }}">
        <input type="hidden" name="is-ss-push" value="{{ Session::get('isStartSessionPush') }}">
        @endif
    </div>
</nav>

