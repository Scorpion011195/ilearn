@extends('backend.ilearn')

@section('content-header')
    <h1>Thông Tin Cá Nhân</h1>
@endsection

@section('content')
    <div class="panel">
        <div class="panel-body">
            @if(session('alertUpdateProfile'))
            <div>
              <p style="color:blue"><span class="glyphicon glyphicon-ok"></span>   {!! session('alertUpdateProfile') !!}</p>
            </div>
            @endif
            <form action="{{ route('adminUpdateProfile') }} "  method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <lable class="control-label col-sm-4 text-center-vertical">Email</lable>
                    <div class="col-sm-8">
                        <input type="text" name="profile-email" class="form-control" readonly value="{{
                         Session::get('user')->email
                        }}">
                    </div>
                </div>
                <div class="row margin-top">
                    <lable class="control-label col-sm-4 text-center-vertical">Tên</lable>
                    <div class="col-sm-8 {!! $errors->has('profile-name') ? ' has-error' : '' !!}">
                        <input type="text" name="profile-name" class="form-control"
                        @if ($errors->has('profile-name'))
                          value="{!! old('profile-name') !!}"
                        @else
                          value="{!! $profile->name !!}"
                        @endif >
                    </div>
                </div>
                @if ($errors->has('profile-name'))
                  <div>
                    <div class="control-label col-sm-4 text-center-vertical"></div>
                    <div class="col-sm-8 {!! $errors->has('profile-name') ? ' has-error' : '' !!}">
                      <div>
                          <p class="help-block"><span class="glyphicon glyphicon-warning-sign"></span>   <strong>{!! $errors->first('profile-name') !!}</strong></p>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row margin-top">
                    <lable class="control-label col-sm-4 text-center-vertical">Địa chỉ</lable>
                    <div class="col-sm-8 {{ $errors->has('profile-address') ? ' has-error' : '' }}">
                        <input type="text" name="profile-address" class="form-control"
                        @if ($errors->has('profile-address'))
                          value="{!! old('profile-address') !!}"
                        @else
                          value="{!! $profile->address !!}"
                        @endif >
                    </div>
                </div>
                @if ($errors->has('profile-address'))
                  <div>
                    <div class="control-label col-sm-4 text-center-vertical"></div>
                    <div class="col-sm-8 {{ $errors->has('profile-address') ? ' has-error' : '' }}">
                      <div>
                          <p class="help-block"><span class="glyphicon glyphicon-warning-sign"></span>   <strong>{!! $errors->first('profile-address') !!}</strong></p>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row margin-top">
                    <lable class="control-label col-sm-4 text-center-vertical">Số điện thoại</lable>
                    <div class="col-sm-8 {{ $errors->has('profile-phone') ? ' has-error' : '' }}">
                        <input type="text" name="profile-phone" class="form-control"
                        @if ($errors->has('profile-phone'))
                          value="{!! old('profile-phone') !!}"
                        @else
                          value="{!! $profile->phone !!}"
                        @endif >
                    </div>
                </div>
                @if ($errors->has('profile-phone'))
                  <div>
                    <div class="control-label col-sm-4 text-center-vertical"></div>
                    <div class="col-sm-8 {{ $errors->has('profile-phone') ? ' has-error' : '' }}">
                      <div>
                          <p class="help-block"><span class="glyphicon glyphicon-warning-sign"></span>   <strong>{!! $errors->first('profile-phone') !!}</strong></p>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row margin-top">
                    <lable class="control-label col-sm-4 text-center-vertical">Ngày sinh</lable>
                    <div class="col-sm-8 {{ $errors->has('profile-dob') ? ' has-error' : '' }}">
                        <input type="date" name="profile-dob" class="form-control" id="profile-dob" value="{{ $profile->date_of_birth }}">
                    </div>
                </div>
                @if ($errors->has('profile-dob'))
                  <div>
                    <div class="control-label col-sm-4 text-center-vertical"></div>
                    <div class="col-sm-8 {{ $errors->has('profile-dob') ? ' has-error' : '' }}">
                      <div>
                          <p class="help-block"><span class="glyphicon glyphicon-warning-sign"></span>   <strong>{!! $errors->first('profile-dob') !!}</strong></p>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row text-center">
                    <input type="submit" class="btn btn-info margin-top text-center" value="Cập nhật">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{!! asset('js/admin/admin-profile.js') !!}"></script>
@endsection
