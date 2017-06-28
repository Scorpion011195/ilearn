
<!-- Search -->
<div class="panel">
    <div class="panel-body">
      @if ($errors->has('FailedCannotFind'))
        <div>
                <p style="color:red"><span class="glyphicon glyphicon-warning-sign"></span>   {!! $errors->first('FailedCannotFind') !!}</p>
        </div>
      @endif
        <div class="row">
          <div class="col-sm-12" >
            <form action="{{ route('adminDictSearchWord') }}" class="form-inline" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                  <span class="{{ $errors->has('_keytratu') ? ' has-error' : '' }}">
                  <input class="form-control" type="text" placeholder="Tra từ" name="_keytratu"
                  @if(isset($code))
                    value="{!! $lastKey !!}"
                  @else
                    value="{!! old('_keytratu') !!}"
                  @endif
                  ></span>
                  <select class="form-control" name="_cbloaitutratu">
                      @foreach($listTypeOfWord as $key=>$value)
                          <option
                              @if($key == $idCbTypeWord)
                                  {!! "selected" !!}
                              @endif
                              value="{{ $key }}">{!! $value !!}</option>
                      @endforeach
                  </select>
                  <select class="form-control" name="_cbnguontratu">
                      @foreach($listLanguage as $language)
                          <option
                              @if($language->id_language == $idCbTableFrom)
                                  {!! "selected" !!}
                              @endif
                              value="{!! $language->id_language !!}">{!! $language->language !!}</option>
                      @endforeach
                  </select>
                  <select class="form-control" name="_cbdichtratu" id="_table-dich">
                      @foreach($listLanguage as $language)
                          <option
                              @if($language->id_language == $idCbTableTo)
                                  {!! "selected" !!}
                              @endif
                              value="{!! $language->id_language !!}">{!! $language->language !!}</option>
                      @endforeach
                  </select>
                  <button type="submit" class="btn btn-info">
                      <span class="glyphicon glyphicon-search"></span>
                  </button>
                </div>
                @if ($errors->has('_keytratu'))
                    <div class="{{ $errors->has('_keytratu') ? ' has-error' : '' }}">
                        <p class="help-block"><span class="glyphicon glyphicon-warning-sign"></span>   <strong>{!! $errors->first('_keytratu') !!}</strong></p>
                    </div>
                @endif
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
                                  <th class="text-center" aria-controls="example1" rowspan="1" colspan="1"
                                      aria-label="Browser: activate to sort column ascending" style="width: 50px;">ID
                                  </th>
                                  <th class="text-center" aria-controls="example1" rowspan="1" colspan="1"
                                      aria-label="Browser: activate to sort column ascending" style="width: 300px;">Nghĩa
                                  </th>
                                  <th class="text-center" aria-controls="example1" rowspan="1" colspan="1"
                                      aria-label="Platform(s): activate to sort column ascending" style="width: 400px;">
                                      Giải thích
                                  </th>
                                  <th class="text-center" aria-controls="example1" rowspan="1" colspan="1"
                                      aria-label="Engine version: activate to sort column ascending" style="width: 200px;">
                                      Hành động
                                  </th>
                              </tr>
                              </thead>
                              <tbody>
                              @if(isset($result))
                               @foreach($result as $row)
                                 <?php $word = json_decode($row->word); ?>
                                 <tr role="row" class="odd">
                                    <td class="_word-id text-center" data-id="{!! $row->id !!}">{!! $row->id !!}</td>
                                    <td contenteditable>{!! $word->word !!}</td>
                                    <td contenteditable>{!! $row->explain !!}</td>
                                    <td class="text-center">
                                      <a href="" class="_detail-user" data-toggle="tooltip" title="Cập nhật!">
                                        <span class="glyphicon glyphicon-edit"></span>
                                      </a>
                                      <a class="_delete-word-to" data-toggle="tooltip" title="Xóa!">
                                        <span class="glyphicon glyphicon-trash"></span>
                                      </a>
                                    </td>
                                 </tr>
                               @endforeach
                              @endif
                              </tbody>
                          </table>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-5">
                          <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Tổng cộng có {{ $countTo }} kết quả
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


