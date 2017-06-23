
<!-- Search -->
<div class="panel">
    <div class="panel-body">
        <div class="row">
          <div class="col-sm-12">
            <form action="{{ route('adminDictSearchWord') }}" class="form-inline" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                  <input class="form-control" type="text" placeholder="Tra từ" name="_keytratu">
                  <select class="form-control" name="_cbloaitutratu">
                      @foreach($listTypeOfWord as $key=>$value)
                          <option
                              @if($key == 1)
                                  {{ "selected" }}
                              @endif
                              value="{{ $key }}">{{ $value }}</option>
                      @endforeach
                  </select>
                  <select class="form-control" name="_cbnguontratu">
                      @foreach($listLanguage as $language)
                          <option
                              @if($language->id_language == 1)
                                  {{ "selected" }}
                              @endif
                              value="{{ $language->id_language }}">{{ $language->language }}</option>
                      @endforeach
                  </select>
                  <select class="form-control" name="_cbdichtratu">
                      @foreach($listLanguage as $language)
                          <option
                              @if($language->id_language == 2)
                                  {{ "selected" }}
                              @endif
                              value="{{ $language->id_language }}">{{ $language->language }}</option>
                      @endforeach
                  </select>
                  <button type="submit" class="btn btn-info">
                      <span class="glyphicon glyphicon-search"></span>
                  </button>
                </div>
            </form>
          </div>
        </div>
        <br>
<!-- /.Search -->

<!-- Table -->

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
                                      aria-label="Browser: activate to sort column ascending" style="width: 50px;">STT
                                  </th>
                                  <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                      aria-label="Browser: activate to sort column ascending" style="width: 300px;">Nghĩa
                                  </th>
                                  <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                      aria-label="Platform(s): activate to sort column ascending" style="width: 400px;">
                                      Giải thích
                                  </th>
                                  <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                      aria-label="Engine version: activate to sort column ascending" style="width: 200px;">
                                      Từ loại
                                  </th>
                              </tr>
                              </thead>
                              <tbody>

                              <tr role="row" class="odd text-center">
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


