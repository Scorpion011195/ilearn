    <!-- Main Header -->
    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo e(utf8_encode(route('adminHome'))); ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>I</b>LE</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>I</b>LEARN</span>
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"><?php echo e(utf8_encode(Session::get('user')->username)); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <!-- <img src="#" class="img-circle" alt="User Image"> -->
                                <p>
                                    <?php echo e(utf8_encode(Session::get('user')->username)); ?>

                                    <small>Thành viên từ <?php echo e(utf8_encode(date('d-m-Y', strtotime(Session::get('user')->created_at)))); ?></small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo e(utf8_encode(route('adminGetChangePassword'))); ?>" class="btn btn-default btn-flat">Đổi mật khẩu</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo e(utf8_encode(route('adminLogout'))); ?>" class="btn btn-default btn-flat">Thoát</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
