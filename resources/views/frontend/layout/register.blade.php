
<div class="register modal fade" id="modal-register" role="dialog">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4  panel no-radius-right no-radius-left">
                {!!  Form::open(array('route' => 'dangki')) !!}
                {!!  csrf_field() !!}
                <div class="panel-heading text-center">
                    <h3>TẠO TÀI KHOẢN</h3>
                </div>
                <hr class="no-margin no-padding">
                <div class="panel-body">
                    <div class="panel-content">
                        <div class="row">
                            <div class="input-group {!! $errors->has('username') ? ' has-error' : '' !!} ">
                                <span class="input-group-addon "><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input id="username" type="text" class="form-control" name="username" value="{!! old('username') !!}" required autofocus placeholder="Tên của bạn"> 
                            </div>
                                @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{!!  $errors->first('username') !!} </strong>
                                </span>
                                @endif
                        </div>
                        <div class="row">
                            <div class="input-group {!! $errors->has('email') ? ' has-error' : '' !!} ">
                                <span class="input-group-addon "><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                <input id="email" type="email" class="form-control" name="email" value="{!! old('email') !!}" required autofocus placeholder="Email của bạn">
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{!! $errors->first('email') !!}</strong>
                                </span>
                            @endif 
                        </div>
                        <div class="row">
                            <div class="input-group {!! $errors->has('password') ? ' has-error' : '' !!} ">
                                <span class="input-group-addon "><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                                <input id="password" type="password" class="form-control" name="password" value="{!! old('password') !!}" required autofocus placeholder="Mật khẩu của bạn">                               
                            </div>
                             @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{!! $errors->first('password') !!}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="row">
                             <div class="input-group {!! $errors->has('confirm_password') ? ' has-error' : '' !!} ">
                                <span class="input-group-addon "><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                                <input id="confirm_password" type="password" class="form-control" name="confirm_password" value="{!! old('confirm_password') !!}" required autofocus placeholder="Nhập lại mật khẩu của bạn">
                                
                            </div>
                             @if ($errors->has('pasword'))
                                <span class="help-block">
                                    <strong>{!! $errors->first('confirm_password') !!}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                        </div>
                        <hr class="no-margin no-padding">
                        <div class="panel-footer text-center background-white ">
                    {!!  Form::submit('Tạo mới', ['class' => 'btn btn-success btn-lg']) !!}
                            <button class="btn btn-default" data-dismiss="modal">Hủy</button>
                     </div>
                {!!  Form::close() !!}
            </div>
        </div>
    </div>

</div>