<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header text-center"><?php echo e(utf8_encode(Session::get('user')->username)); ?> </li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview" id="_menu-qltd">
                <a href="<?php echo e(utf8_encode(route('adminHome'))); ?>"><i class="fa fa-book"></i> <span>Quản lý từ điển</span>
                <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li id="_menu-qltd-tt"><a href="<?php echo e(utf8_encode(route('adminDictCreate'))); ?>">Thêm từ</a></li>
                    <li id="_menu-qltd-trt"><a href="<?php echo e(utf8_encode(route('adminDictSearch'))); ?>">Tra từ</a></li>
                    <li id="_menu-qltd-tk"><a href="<?php echo e(utf8_encode(route('adminDictCollect'))); ?>">Thống kê</a></li>
                    <li id="_menu-qltd-tfscv"><a href="<?php echo e(utf8_encode(route('adminDictUpload'))); ?>">Thêm file csv</a></li>
                </ul>
            </li>
            <li id="_menu-qltk"><a href="<?php echo e(utf8_encode(route('adminUserManagement'))); ?>"><i class="fa fa-user-circle"></i> <span>Quản lý tài khoản</span></a></li>
            <li id="_menu-ttcn"><a href="<?php echo e(utf8_encode(route('adminProfile'))); ?>"><i class="fa fa-vcard"></i> <span>Thông tin cá nhân</span></a></li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
