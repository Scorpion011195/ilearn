  <!-- Search -->
  <div class="panel">
      <div class="panel-body">
          <div class="row">
            <div class="col-sm-12" >
              <form action="{{ route('adminDictSearchWord') }}" class="form-inline" method="get">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                    <span class="{{ $errors->has('_keytratu') ? ' has-error' : '' }}">
                    <input class="form-control" type="text" placeholder="Nhập từ" name="_keytratu"
                    @if(isset($code))
                      value="{!! $lastKey !!}"
                    @else
                      value="{!! old('_keytratu') !!}"
                    @endif
                    required maxlength="50"></span>
                    <select class="form-control" name="_cbloaitutratu">
                        @foreach($listTypeOfWord as $key=>$value)
                            <option
                                @if($key == $idCbTypeWord)
                                    {!! "selected" !!}
                                @endif
                                value="{{ $key }}">{!! $value !!}</option>
                        @endforeach
                    </select>
                    <div class="input-group ">
                    <span class="input-group-addon">From</span>
                    <select class="form-control" name="_cbnguontratu">
                        @foreach($listLanguage as $language)
                            <option
                                @if($language->id_language == $idCbTableFrom)
                                    {!! "selected" !!}
                                @endif
                                value="{!! $language->id_language !!}">{!! $language->language !!}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="input-group ">
                    <span class="input-group-addon">To</span>
                    <select class="form-control" name="_cbdichtratu" id="_table-to">
                        @foreach($listLanguage as $language)
                            <option
                                @if($language->id_language == $idCbTableTo)
                                    {!! "selected" !!}
                                @endif
                                value="{!! $language->id_language !!}">{!! $language->language !!}</option>
                        @endforeach
                    </select>
                    </div>
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
      @if (isset($code))
          @if($code == "FailedCannotFind")
            <div>
              <p class="alert--fail" id="_notify"><span class="glyphicon glyphicon-warning-sign"></span>   Không tìm thấy kết quả</p>
            </div>
          @elseif($code == "Success")
            <div>
              <p class="alert--success" id="_notify"><span class="glyphicon glyphicon-ok"></span>   Có {!! $countTo !!} kết quả được tìm thấy</p>
            </div>
          @endif
     @endif
  <!-- Table -->
          <div class="box">
            <div class="box-body">
                <div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable word--break-word" role="grid"
                                   aria-describedby="example1_info">
                                <thead>
                                <tr role="row">
                                    <th class="text-center col--width05" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">ID
                                    </th>
                                    <th class="text-center col--width3" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Nghĩa
                                    </th>
                                    <th class="text-center col--width4" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">
                                        Giải thích
                                    </th>
                                    <th class="text-center col--width1" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Engine version: activate to sort column ascending">
                                        Hành động
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($result))
                                 @foreach($result as $row)
                                   <?php $word = json_decode($row->word); ?>
                                   <tr role="row" class="odd" id="_tr{!! $row->id !!}">
                                      <td class="_word-id text-center align--vertical-middle" data-id="{!! $row->id !!}">{!! $row->id !!}</td>
                                      <td class="_word align--vertical-middle" id="_td-word{!! $row->id !!}">{!! $word->word !!}</td>
                                      <td class="_explain align--vertical-middle" id="_td-explain{!! $row->id !!}">{!! $row->explain !!}</td>
                                      <td class="text-center align--vertical-middle">
                                        <button class="_update-word _tooltip-me btn__icon btn--color-link" data-toggle="modal" title="Cập nhật!" data-target="#myModal">
                                          <span class="glyphicon glyphicon-edit"></span>
                                        </button>
                                        <button class="_delete-word-to _tooltip-me btn__icon btn--color-link" title="Xóa!">
                                          <span class="glyphicon glyphicon-trash"></span>
                                        </button>
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
@include('backend.components.dict.search.modal-search')


