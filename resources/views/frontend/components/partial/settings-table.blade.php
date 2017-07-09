
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Danh sách từ</h3>
    </div>
    @if(isset($SSMessageDuration))
    <center>{{ $SSMessageDuration }}</center>
    @endif
</div>
<!-- /.box-header -->
<div class="body">
    <div id="example_wrapper" class=" form-inline dt-bootstrap">
        <div class="row">
            <div class="col-sm-6">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table id="example1" class="table table-bordered table-striped dataTable word--break-word" role="grid"
                aria-describedby="example1_info">
                  <thead>
                    <tr role="row">
                        <th class="text-center col--width2">Từ</th>
                        <th class="text-center col--width2">Nghĩa</th>
                        <th class="text-center col--width1">Loại từ </th>
                        <th class="text-center col--width3">Từ điển</th>
                        <th class="text-center col--width1">Notification</th>
                        <th class="text-center col--width1">Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(isset($data))
                    @foreach($data as $row)
                    <tr>
                        <td class="_from text-center align--vertical-middle">{!! $row['from_text'] !!}</td>
                        <td class="_to text-center align--vertical-middle">{!! $row['to_text'] !!} </td>
                        <td class="type_to text-center align--vertical-middle">{!! $row['type_to'] !!} </td>
                        <td class="text-center align--vertical-middle">{!! $row['from'] !!}-{!! $row['to'] !!}</td>
                        @if($row['notification'] == 'T')
                        <td class="text-center align--vertical-middle"><input type="checkbox" name="notification" class="action" checked></td>
                        @else
                        <td class="text-center align--vertical-middle"><input type="checkbox" name="notification" class="action"></td>
                        @endif

                        <td class="text-center align--vertical-middle">
                            <span>
                                <a class="deleteRecord" data-toggle="tooltip" data-placement="left" title="Xóa!"><i class=" fa fa-trash-o fa-1x" aria-hidden="true"  "></i></a>
                            </span>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
