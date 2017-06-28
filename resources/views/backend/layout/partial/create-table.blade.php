<div class="panel">
    <div class="panel-body">
        @if ($errors->has('Success'))
        <div class="container">
                <p style="color:blue"><span class="glyphicon glyphicon-ok"></span>   {!! $errors->first('Success') !!}</p>
        </div>
        @endif

        @if ($errors->has('FailedCannotFind'))
        <div class="container">
                <p style="color:red"><span class="glyphicon glyphicon-warning-sign"></span>   {!! $errors->first('FailedCannotFind') !!}</p>
        </div>
        @endif

        <form class="form-inline" action="{{ route('adminDictCreateWord') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                          <select class="form-control" name="_cbnguon">
                              @foreach($listLanguage as $language)
                                  <option
                                      @if($language->id_language == $idTableNguon)
                                          {!! "selected" !!}
                                      @endif
                                      value="{!! $language->id_language !!}">{!! $language->language !!}</option>
                              @endforeach
                          </select>
                          <select class="form-control" name="_cbloaitu">
                              @foreach($listTypeOfWord as $key=>$value)
                                  <option
                                      @if($key == $idLoaiTu)
                                          {!! "selected" !!}
                                      @endif
                                      value="{{ $key }}">{!! $value !!}</option>
                              @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <select class="form-control" name="_cbdich">
                              @foreach($listLanguage as $language)
                                  <option
                                      @if($language->id_language == $idTableDich)
                                          {!! "selected" !!}
                                      @endif
                                      value="{!! $language->id_language !!}">{!! $language->language !!}</option>
                              @endforeach
                          </select>
                          <button type="submit" class="btn btn-info">
                              <span class="glyphicon glyphicon-upload"></span>  Thêm
                          </button>
                        </div>
                    </div>
                </div>

            <br>

            <div class="row">
                    <div class="col-sm-6 {{ $errors->has('_txttu') ? ' has-error' : '' }}">
                          <div class="input-group ">
                              <span class="input-group-addon">Từ</span>
                              <input size="30" id="msg" type="text" class="form-control" name="_txttu" placeholder="Hello" value="{!! old('_txttu') !!}">
                          </div>
                          @if ($errors->has('_txttu'))
                              <span class="help-block">
                                  <strong>{!! $errors->first('_txttu') !!}</strong>
                              </span>
                          @endif
                    </div>
                    <div class="col-sm-6 {{ $errors->has('_txtnghia') ? ' has-error' : '' }}">
                          <div class="input-group">
                              <span class="input-group-addon">Nghĩa</span>
                              <input size="30" id="msg" type="text" class="form-control" name="_txtnghia" placeholder="Xin chào" value="{!! old('_txtnghia') !!}">
                          </div>
                          @if ($errors->has('_txtnghia'))
                              <span class="help-block">
                                  <strong>{!! $errors->first('_txtnghia') !!}</strong>
                              </span>
                          @endif
                    </div>
            </div>

            <br>

            <div class="row">
                    <div class="col-sm-6 {{ $errors->has('_tatu') ? ' has-error' : '' }}">
                          <textarea class="form-control" rows="5" cols="36" placeholder="Giải thích" name="_tatu">{!! old('_tatu') !!}</textarea>
                          @if ($errors->has('_tatu'))
                              <span class="help-block">
                                  <strong>{!! $errors->first('_tatu') !!}</strong>
                              </span>
                          @endif
                    </div>
                    <div class="col-sm-6 {{ $errors->has('_tanghia') ? ' has-error' : '' }}">
                          <textarea class="form-control" rows="5" cols="39" placeholder="Giải thích" name="_tanghia">{!! old('_tanghia') !!}</textarea>
                          @if ($errors->has('_tanghia'))
                              <span class="help-block">
                                  <strong>{!! $errors->first('_tanghia') !!}</strong>
                              </span>
                          @endif
                    </div>
            </div>
        </form>
    </div>
</div>

<!-- Table them tu -->
     <!-- file create-table.txt -->
<!-- /.Table them tu -->


