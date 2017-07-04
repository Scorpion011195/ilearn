<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="">
</head>
<body>
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
                    <table id="example1" class="table table-bordered table-striped " role="grid"
                    aria-describedby="example1_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending" style="width: 150px;">Từ
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="Platform(s): activate to sort column ascending" style="width: 150px;">
                        Nghĩa
                    </th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                aria-label="Engine version: activate to sort column ascending" style="width: 143px;">
                Loại từ
            </th>
            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
            aria-label="CSS grade: activate to sort column ascending" style="width: 153px;">Từ điển
        </th>
        <th class="" tabindex="0" aria-controls="" rowspan="1" colspan="1"
        aria-label="" style="width: 50px;">Notification</th>
        <th class="" tabindex="1" aria-controls="" rowspan=""
        aria-label="" style="width: 103px;">Hành động</th>
    </thead>
    <tbody>
        @if(isset($data))
        @foreach($data as $row)
        <tr>
            <td id="_from" value="{!! $row['from_text'] !!}">{!! $row['from_text'] !!}</td>
            <td id="_to" data-id="{!! $row['to_text'] !!}">{!! $row['to_text'] !!} </td>
            <td id="type_to" data-id="">{!! $row['type_to'] !!} </td>
            <td>{!! $row['from'] !!}-{!! $row['to'] !!}</td>
            <td class="delete">{!! $row['notification'] !!} </td>

            <td class="editable editable-click" aria-hidden="false">
                <span>
                    <a class="deleteRecord" data-id="{!! $row['to_text'] !!}" value="{!! $row['from_text'] !!}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                </span>
                <span>
                    <a class="editRecord" data-id=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                </span>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>

</table>


</div>
</div>
