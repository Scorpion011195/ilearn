<body >
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
                    <a id="closepage" menuid="0" class="brand" href="#" followlink="true">
                        LOGO</a>

                </div>
                <div class="collapse navbar-collapse pull-right" id="main-menu">
                    <ul class="nav">
                        <?php echo Form::open(['class' => 'brand-btn', 'id' => 'nav-form-login']); ?>

                        <div class="form-inline row">
                            <?php echo Form::text('username', '', ['class' => 'form-control nav-login collapse', 'placeholder' => 'Tên đăng nhập']); ?>

                            <?php echo Form::text('password', '', ['class' => 'form-control nav-login collapse', 'placeholder' => 'Mật khẩu']); ?>

                            <?php echo Form::submit('Đăng nhập', ['class' => 'btn btn-default', 'id' => 'nav-login-btn']); ?>

                            <button class="btn btn-default facebook-background-color nav-login collapse">
                                <i class="fa fa-facebook fa-lg facebook-font-color" aria-hidden="true"></i>
                            </button>
                            <button class="btn btn-default google-background-color nav-login collapse">
                                <i class="fa fa-google-plus fa-lg google-font-color" aria-hidden="true"></i>
                            </button>
                            <a class="nav-login collapse" data-toggle="modal" href="#modal-register">Đăng ký</a>
                        </div>
                        <?php echo Form::close(); ?>

                    </ul>
                </div>
                
                    
                        

                        

                        
                            
                            
                                
                                    
                                    
                                           
                                           
                                           
                                           

                                       
                                
                                
                                
                                    
                                    
                                         
                                         
                                         
                                         
                                         
                                     
                                
                                
                                
                                
                            


                        

                        

                        

                        

                    

                
                <!--/.nav-collapse -->
            

    </header>

</div><!--menu-->



