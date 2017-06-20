<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

<!--         Sidebar user panel (optional)
<div class="user-panel">
    <div class="pull-left image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
        <p>Alexander Pierce</p>
        Status
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
</div>

search form (Optional)
<form action="#" method="get" class="sidebar-form">
    <div class="input-group">
<input type="text" name="q" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
</button>
      </span>
    </div>
</form>
/.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header text-center">{{ Session::get('user')->username }} </li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview" id="_menu-qltd">
                <a href="{{ route('adminHome') }}"><i class="fa fa-book"></i> <span>Quản lý từ điển</span>
                <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li id="_menu-qltd-tt"><a href="{{ route('adminDictCreate') }}">Thêm từ</a></li>
                    <li id="_menu-qltd-dt"><a href="{{ route('adminDictApprove') }}">Duyệt từ</a></li>
                    <li id="_menu-qltd-tk"><a href="{{ route('adminDictCollect') }}">Thống kê</a></li>
                    <li id="_menu-qltd-tfscv"><a href="{{ route('adminDictUpload') }}">Thêm file scv</a></li>
                </ul>
            </li>
            <li id="_menu-qltk"><a href="{{ route('adminUserManagement') }}"><i class="fa fa-user-circle"></i> <span>Quản lý tài khoản</span></a></li>
            <li id="_menu-ttcn"><a href="{{ route('adminProfile') }}"><i class="fa fa-vcard"></i> <span>Thông tin cá nhân</span></a></li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
