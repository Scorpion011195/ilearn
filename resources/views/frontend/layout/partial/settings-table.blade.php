<?php 

?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Danh sách từ</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div id="example_wrapper" class=" form-inline dt-bootstrap">
            <div class="row">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search"
                     class="form-control input-sm"
                     placeholder=""
                     aria-controls="example1"></label>
                 </div>
             </div>
             </div>
             <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped " role="grid"
                    aria-describedby="example1_info">
                    <thead>
                        <tr role="row">
                            <th class="" tabindex="" aria-controls="" rowspan="1" colspan="1"
                            aria-sort="" aria-label=""
                            style="width: 50px;"> STT
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
            <th class="" tabindex="0" aria-controls="" rowspan="1" colspan="1"
            aria-label="" style="width: 103px;">Hành động</th>
        </thead>
        <tbody>
            @if(isset($data))
            @foreach($data as $row)
            <tr>
                <td>{{ $row['STT'] }}</td>
                <td>{!! $row['from_text'] !!}</td>
                <td>{!! $row['to_text'] !!} </td>
                <td>{{ $row['type_to'] }} </td>
                <td>{{ $row['from'] }}-{{ $row['to'] }}</td>
                <td>{{ $row['notification'] }} </td>

                <td><i class="fa fa-trash-o" aria-hidden="true"></i></td>
            </tr>

            @endforeach
            @endif




        </tbody>

    </table>

</div>
</div>
<div class="row">
    <div class="col-sm-5">
        <?php 
        $count= count($data);
        ?>
        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of
            <?php echo $count?>
        </div>
    </div>
    <div class="col-sm-7">

       <!-- /.box-body -->
   </div>