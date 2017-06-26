<div class="panel">
    <div class="panel-body">
        @if($code=='failedInputEmptyFrom')
            <div class="alert alert-danger text-center">
              Bạn chưa nhập từ!
            </div>
        @elseif($code=='failedInputEmptyTo')
            <div class="alert alert-danger text-center">
              Bạn chưa nhập nghĩa!
            </div>
        @elseif($code=='failedWord')
            <div class="alert alert-danger text-center">
              Từ đã có trong hệ thống!
            </div>
        @elseif($code=='SuccessfulWord')
            <div class="alert alert-success text-center">
              Thêm từ thành công!
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
                                          {{ "selected" }}
                                      @endif
                                      value="{{ $language->id_language }}">{{ $language->language }}</option>
                              @endforeach
                          </select>
                          <select class="form-control" name="_cbloaitu">
                              @foreach($listTypeOfWord as $key=>$value)
                                  <option
                                      @if($key == $idLoaiTu)
                                          {{ "selected" }}
                                      @endif
                                      value="{{ $key }}">{{ $value }}</option>
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
                                          {{ "selected" }}
                                      @endif
                                      value="{{ $language->id_language }}">{{ $language->language }}</option>
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
                    <div class="col-sm-6">
                          <div class="input-group">
                              <span class="input-group-addon">Từ</span>
                              <input size="30" id="msg" type="text" class="form-control" name="_txttu" placeholder="Hello" value="{{ $lastTxtTu }}">
                          </div>
                    </div>
                    <div class="col-sm-6">
                          <div class="input-group">
                              <span class="input-group-addon">Nghĩa</span>
                              <input size="30" id="msg" type="text" class="form-control" name="_txtnghia" placeholder="Xin chào" value="{{ $lastTxtNghia }}">
                          </div>
                    </div>
            </div>

            <br>

            <div class="row">
                    <div class="col-sm-6">
                          <textarea class="form-control" rows="5" cols="36" placeholder="Giải thích" name="_tatu"></textarea>
                    </div>
                    <div class="col-sm-6">
                          <textarea class="form-control" rows="5" cols="39" placeholder="Giải thích" name="_tanghia"></textarea>
                    </div>
            </div>
        </form>
    </div>
</div>

<!-- Table them tu -->
     <!-- file create-table.txt -->
<!-- /.Table them tu -->


