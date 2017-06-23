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
                                      @if($language->id_language == 1)
                                          {{ "selected" }}
                                      @endif
                                      value="{{ $language->id_language }}">{{ $language->language }}</option>
                              @endforeach
                          </select>
                          <select class="form-control" name="_cbloaitu">
                              @foreach($listTypeOfWord as $key=>$value)
                                  <option
                                      @if($key == 6)
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
                                      @if($language->id_language == 2)
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

<!-- Search -->
<div class="panel">
    <div class="panel-body">
        <div class="row">
          <div class="col-sm-12">
            <form class="form-inline">
                <div class="form-group">
                  <input class="form-control" type="text" placeholder="Tra từ">
                  <button type="submit" class="btn btn-info">
                      <span class="glyphicon glyphicon-search"></span>
                  </button>
                </div>
            </form>
          </div>
        </div>
    </div>
</div>
<!-- /.Search -->

<!-- Table -->
<div class="panel">
    <div class="panel-body">
        <div class="box">
          <div class="box-body">
              <div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                  <div class="row">
                      <div class="col-sm-12">
                          <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                                 aria-describedby="example1_info">
                              <thead>
                              <tr role="row">
                                  <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                      aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                                      style="width: 50px;">STT
                                  </th>
                                  <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                      aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                                      style="width: 250px;">Từ
                                  </th>
                                  <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                      aria-label="Browser: activate to sort column ascending" style="width: 250px;">Nghĩa
                                  </th>
                                  <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                      aria-label="Platform(s): activate to sort column ascending" style="width: 184px;">
                                      Từ điển
                                  </th>
                                  <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                      aria-label="Engine version: activate to sort column ascending" style="width: 100px;">
                                      Lượt sử dụng
                                  </th>
                                  <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                      aria-label="Engine version: activate to sort column ascending" style="width: 100px;">
                                      Tình trạng
                                  </th>
                                  <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                      aria-label="CSS grade: activate to sort column ascending" style="width: 103px;">Hành động
                                  </th>
                              </tr>
                              </thead>
                              <tbody>

                              <tr role="row" class="odd text-center">
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                              </tr>

                              </tbody>
                          </table>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-5">
                          <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Tổng cộng có 0 kết quả
                          </div>
                      </div>
                      <div class="col-sm-7">
                      </div>
                  </div>
              </div>
          </div>
          <!-- /.box-body -->
        </div>
    </div>
</div>
<!-- /.Table -->

<!-- Table them tu -->
     <!-- file create-table.txt -->
<!-- /.Table them tu -->


