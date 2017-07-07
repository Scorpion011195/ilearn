
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Danh sách từ</h3>
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
                    <table id="example1" class="table-bordered table-striped table table-hover " role="grid">
                    <thead>
                        <tr role="row">
                            <th class="col--width2">Từ</th>   
                            <th class="col--width2">Nghĩa</th>
                            <th class="col--width1">Loại từ </th>
                            <th class="col--width3">Từ điển</th>
                            <th class="col--width1" style="">Notification</th>
                            <th class="col--width05" tabindex="1" aria-controls="" rowspan=""
                            aria-label="">Hành động</th>
                        </thead>
                        <tbody>
                            @if(isset($data))
                            @foreach($data as $row)
                            <tr>
                                <td class="_from">{!! $row['from_text'] !!}</td>
                                <td class="_to">{!! $row['to_text'] !!} </td>
                                <td class="type_to">{!! $row['type_to'] !!} </td>
                                <td>{!! $row['from'] !!}-{!! $row['to'] !!}</td>
                                @if($row['notification'] == 'T')
                                <td class=""><input type="checkbox" name="notification" class="action" checked></td>
                                @else
                                <td class=""><input type="checkbox" name="notification" class="action"></td>
                                @endif

                                <td>
                                    <span>
                                        <a class="deleteRecord" data-id="{!! $row['to_text'] !!}" value="{!! $row['from_text'] !!}" data-toggle="tooltip" data-placement="left" title="Xóa!"><i class="fa fa-trash-o fa-1x" aria-hidden="true"  "></i></a>
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>

                    </table>


                </div>
            </div>