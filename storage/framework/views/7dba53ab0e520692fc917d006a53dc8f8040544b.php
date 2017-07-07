<meta name="csrf-token" content="<?php echo csrf_token(); ?>">
    <nav class="navbar navbar">
        <div class="container">
            <?php if(Auth::guest()): ?>
            <ul class="nav navbar-nav">
              <li><a href="<?php echo e(utf8_encode(url('/'))); ?>">Trang chủ</a></li>
              <!-- <li><a href="<?php echo e(utf8_encode(url('note'))); ?>">Lịch sử</a></li>
              <li><a href="<?php echo e(utf8_encode(url ('note'))); ?>">Cài đặt</a></li> -->             
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php echo Form::open(array('route' => 'dangnhap', 'class' => 'brand-btn', 'id' => 'nav-form-login', 'form' => '1') ); ?>


                <div class="form-inline row">
                    <?php echo Form::text('name', Illuminate\Support\Facades\Input::old('name'), ['class' => 'form-control nav-login collapse', 'placeholder' => 'Tên đăng nhập', 'required']); ?>


                    <input class="form-control nav-login collapse" placeholder="Mật khẩu của bạn" name="pass" type="password" value="<?php echo e(utf8_encode(old('pass'))); ?>"/>

                    <input class= "nav-login" type="checkbox" name="remember" <?php echo old('remember') ? 'checked' : ''; ?>>  <span class="nav-login">Remember</span>
                    <?php echo Form::button('Đăng nhập', ['class' => 'btn btn-default', 'id' => 'nav-login-btn', 'onclick' => 'doSubmit()']); ?>


                    <a class="nav-login collapse" id="idXXX" data-toggle="modal" href="#modal-register">Đăng ký</a>
                </div>
                <?php echo Form::close(); ?>

            </ul>
            <?php else: ?>
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo e(utf8_encode(url('/'))); ?>">Trang chủ</a></li>
                    <li><a href="<?php echo e(utf8_encode(url('/historys'))); ?>">Lịch sử</a></li>
                    <li><a href="<?php echo e(utf8_encode(url('/settings'))); ?>">Cài đặt</a></li>             
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <?php echo e(utf8_encode(Auth::user()->username)); ?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="<?php echo route('logout'); ?>"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="<?php echo route('logout'); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>

                            </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </nav>
    <?php if($errors->has('errorLogin')): ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo $errors->first('errorLogin'); ?>

        </div>
    <?php endif; ?>
<script type="text/javascript">
    $( document ).ready(function() {
        <?php if(($errors -> has('username') || $errors -> has('email') || $errors -> has('password') || $errors -> has('confirm_password'))): ?>
            document.getElementById('idXXX').click();
        <?php endif; ?>   
});

</script>

