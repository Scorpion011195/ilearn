<!--     Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header text-center">{{ Session::get('user')->username }} </li>
            <!-- superadmin -->
            @if( Auth::user()->id_role == 1)
            <li class="treeview" id="_menu-qltd">
                <a href="{{ route('adminHome') }}"><i class="fa fa-book"></i> <span>Quản lý từ điển</span>
                <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li id="_menu-qltd-tt"><a href="{{ route('adminDictCreate') }}">Thêm từ</a></li>
                    <li id="_menu-qltd-trt"><a href="{{ route('adminDictSearch') }}">Tra từ</a></li>
                    <li id="_menu-qltd-tk"><a href="{{ route('adminDictCollect') }}">Thống kê</a></li>
                    <li id="_menu-qltd-tfscv"><a href="{{ route('adminDictUpload') }}">Thêm file csv</a></li>
                </ul>
            </li>
            <li id="_menu-qltk"><a href="{{ route('adminUserManagement') }}"><i class="fa fa-user-circle"></i> <span>Quản lý tài khoản</span></a></li>
            @endif
            <!-- admin -->
            @if( Auth::user()->id_role == 2)
            <li class="treeview" id="_menu-qltd">
                <a href="{{ route('adminHome') }}"><i class="fa fa-book"></i> <span>Quản lý từ điển</span>
                <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li id="_menu-qltd-tt"><a href="{{ route('adminDictCreate') }}">Thêm từ</a></li>
                    <li id="_menu-qltd-trt"><a href="{{ route('adminDictSearch') }}">Tra từ</a></li>
                    <li id="_menu-qltd-tk"><a href="{{ route('adminDictCollect') }}">Thống kê</a></li>
                    <li id="_menu-qltd-tfscv"><a href="{{ route('adminDictUpload') }}">Thêm file csv</a></li>
                </ul>
            </li>
            <li id="_menu-qltk"><a href="{{ route('adminUserManagement') }}"><i class="fa fa-user-circle"></i> <span>Quản lý tài khoản</span></a></li>
            @endif
            <!-- editor -->
            @if( Auth::user()->id_role == 3)
            <li class="treeview" id="_menu-qltd">
                <a href="{{ route('adminHome') }}"><i class="fa fa-book"></i> <span>Quản lý từ điển</span>
                <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li id="_menu-qltd-tt"><a href="{{ route('adminDictCreate') }}">Thêm từ</a></li>
                    <li id="_menu-qltd-trt"><a href="{{ route('adminDictSearch') }}">Tra từ</a></li>
                    <li id="_menu-qltd-tk"><a href="{{ route('adminDictCollect') }}">Thống kê</a></li>
                    <li id="_menu-qltd-tfscv"><a href="{{ route('adminDictUpload') }}">Thêm file csv</a></li>
                </ul>
            </li>
            @endif
            <!-- contributor -->
            @if( Auth::user()->id_role == 4)
            <li class="treeview" id="_menu-qltd">
                <a href="{{ route('adminHome') }}"><i class="fa fa-book"></i> <span>Quản lý từ điển</span>
                <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li id="_menu-qltd-tt"><a href="{{ route('adminDictCreate') }}">Thêm từ</a></li>
                    <li id="_menu-qltd-trt"><a href="{{ route('adminDictSearch') }}">Tra từ</a></li>
                    <li id="_menu-qltd-tfscv"><a href="{{ route('adminDictUpload') }}">Thêm file csv</a></li>
                </ul>
            </li>
            @endif
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

