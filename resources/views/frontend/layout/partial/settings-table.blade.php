<?php 

 ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Danh sách từ</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
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
               </div
               <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                    aria-describedby="example1_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                            style="width: 50px;"> STT
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending" style="width: 200px;">Từ
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="Platform(s): activate to sort column ascending" style="width: 200px;">
                        Nghĩa
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-label="Engine version: activate to sort column ascending" style="width: 143px;">
                    Giải thích
                </th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                aria-label="CSS grade: activate to sort column ascending" style="width: 103px;">Từ điển
            </th>
            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
            aria-label="CSS grade: activate to sort column ascending" style="width: 103px;">Notification</th>
        </thead>
        <tbody>
            @foreach($data as $row)
            <tr>
                <td>{{ $row['STT'] }}</td>
                <td>{{ $row['from_text'] }}</td>
                <td>{{ $row['to_text'] }} </td>
                <td>{{ $row['from_explain'] }}-{{ $row['to_explain'] }}</td>
                <td>{{ $row['from'] }}-{{ $row['to'] }}</td>
                <td>{{ $row['notification'] }}</td>
                
            
            </tr>

            @endforeach




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