<div class="register modal fade" id="modal-register" role="dialog">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4  panel no-radius-right no-radius-left">
                {!! Form::open() !!}
                <div class="panel-heading text-center">
                    <h3>TẠO TÀI KHOẢN</h3>
                </div>
                <hr class="no-margin no-padding">
                <div class="panel-body">
                    <div class="panel-content">
                        <div class="row">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                {!! Form::text('signupName', '',['class' => 'form-control', 'placeholder' => 'Tên của bạn']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope-open-o fa" aria-hidden="true"></i></span>
                                {!! Form::text('signupEmail', '',['class' => 'form-control ', 'placeholder' => 'Email']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user-secret fa" aria-hidden="true"></i></span>
                                {!! Form::password('signupPassword',['class' => 'form-control', 'placeholder' => 'Mật khẩu']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user-secret fa" aria-hidden="true"></i></span>
                                {!! Form::password('signupPasswordConfirm',['class' => 'form-control', 'placeholder' => 'Nhắc lại MK']) !!}
                            </div>
                        </div>
                    </div>
                        </div>
                <hr class="no-margin no-padding">
                <div class="panel-footer text-center background-white ">
                    {!! Form::submit('Tạo mới', ['class' => 'btn btn-success btn-lg']) !!}
                    <button class="btn btn-default" data-dismiss="modal">Hủy</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>