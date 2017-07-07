
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Danh sách từ</h3>
    </div>
    @if(isset($SSMessageDuration))

             <center>{{ $SSMessageDuration }}</center>
         </div>
@endif
<br>
    <!-- /.box-header -->
    <div class="body">
        <div id="example_wrapper" class=" form-inline dt-bootstrap">
            <div class="row">
                <div class="col-sm-6">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                    aria-describedby="example1_info">
                    <thead>
                        <tr role="row">
                            <th class="text-center col--width2">Từ</th>
                            <th class="text-center col--width2">Nghĩa</th>
                            <th class="text-center col--width1">Loại từ </th>
                            <th class="text-center col--width3">Từ điển</th>
                            <th class="text-center col--width1">Notification</th>
                            <th class="text-center col--width1">Hành động</th>
                        </thead>
                        <tbody>
                            @if(isset($data))
                            @foreach($data as $row)
                            <tr>
                                <td class="_from text-center">{!! $row['from_text'] !!}</td>
                                <td class="_to text-center">{!! $row['to_text'] !!} </td>
                                <td class="type_to text-center">{!! $row['type_to'] !!} </td>
                                <td class="text-center">{!! $row['from'] !!}-{!! $row['to'] !!}</td>
                                @if($row['notification'] == 'T')
                                <td class="text-center"><input type="checkbox" name="notification" class="action" checked></td>
                                @else
                                <td class="text-center"><input type="checkbox" name="notification" class="action"></td>
                                @endif

                                <td class="text-center">
                                    <span>
                                        <a class="deleteRecord" data-id="{!! $row['to_text'] !!}" value="{!! $row['from_text'] !!}" data-toggle="tooltip" data-placement="left" title="Xóa!"><i class=" fa fa-trash-o fa-1x" aria-hidden="true"  "></i></a>
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>

                    </table>


                </div>
            </div>
