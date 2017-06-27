
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
                                style="width: 50px;">ID
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
                            <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Engine version: activate to sort column ascending" style="width: 100px;">
                                Lượt sử dụng
                            </th>
                            <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Engine version: activate to sort column ascending" style="width: 100px;">
                                Từ loại
                            </th>
                            <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Engine version: activate to sort column ascending" style="width: 100px;">
                                Tình trạng
                            </th>
                            <!-- <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="CSS grade: activate to sort column ascending" style="width: 103px;">Hành động
                            </th> -->
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($submitions as $row)
                        <tr role="row" class="odd text-center">
                            <td>{{ $row->STT }}</td>
                            <td class='_edit-me'>{!! $row->from_text !!}</td>
                            <td class='_edit-me'>{!! $row->to_text !!}</td>
                            <td>{!! $row->from !!}-{!! $row->to !!}</td>
                            <td>{!! $row->quanlity !!}</td>
                            <td>{!! $row->type_from !!}</td>
                            <td>{!! $row->status !!}</td>
                            <!-- <td>
                                @if($row->status=='added')
                                    <a class="" data-toggle="tooltip" title="Đã có!">
                                      <span class="glyphicon glyphicon-ok"></span>
                                    </a>
                                @else
                                    <a href="" class="" data-toggle="tooltip" title="Thêm vào từ điển">
                                      <span class="glyphicon glyphicon-upload"></span>
                                    </a>
                                @endif

                            </td> -->
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5">
                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Tổng cộng có {!! $noOfSubmitions !!} kết quả
                    </div>
                </div>
                <div class="col-sm-7">
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
</div>

{!! $submitions->links() !!}
