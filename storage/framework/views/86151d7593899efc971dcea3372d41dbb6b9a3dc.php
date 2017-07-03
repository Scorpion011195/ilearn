<?php 

?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Danh sách từ</h3>
    </div>
    <!-- /.box-header -->
<<<<<<< HEAD
<<<<<<< HEAD
    <div class="box-body">
=======
    <div class="body">
>>>>>>> master
=======
    <div class="body">
>>>>>>> master
        <div id="example_wrapper" class=" form-inline dt-bootstrap">
            <div class="row">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
<<<<<<< HEAD
<<<<<<< HEAD
                    <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search"
=======
                    <div id="example1_filter" class=""><label>Search:<input type="search"
>>>>>>> master
=======
                    <div id="example1_filter" class=""><label>Search:<input type="search"
>>>>>>> master
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
<<<<<<< HEAD
<<<<<<< HEAD
            <th class="" tabindex="0" aria-controls="" rowspan="1" colspan="1"
=======
            <th class="" tabindex="1" aria-controls="" rowspan=""
>>>>>>> master
=======
            <th class="" tabindex="1" aria-controls="" rowspan=""
>>>>>>> master
            aria-label="" style="width: 103px;">Hành động</th>
        </thead>
        <tbody>
            <?php if(isset($data)): ?>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e(utf8_encode($row['STT'])); ?></td>
<<<<<<< HEAD
<<<<<<< HEAD
                <td><?php echo $row['from_text']; ?></td>
=======
                <td class="sorting_1"><?php echo $row['from_text']; ?></td>
>>>>>>> master
                <td><?php echo $row['to_text']; ?> </td>
                <td><?php echo $row['type_to']; ?> </td>
                <td><?php echo $row['from']; ?>-<?php echo $row['to']; ?></td>
                <td class="delete"><?php echo $row['notification']; ?> </td>

<<<<<<< HEAD
                <td><i class="fa fa-trash-o" aria-hidden="true"></i></td>
=======
                <td class="sorting_1"><?php echo $row['from_text']; ?></td>
                <td><?php echo $row['to_text']; ?> </td>
                <td><?php echo $row['type_to']; ?> </td>
                <td><?php echo $row['from']; ?>-<?php echo $row['to']; ?></td>
                <td class="delete"><?php echo $row['notification']; ?> </td>

=======
>>>>>>> master
                <td class="editable editable-click" aria-hidden="false">
                <a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
               <a class="deleteProduct" data-id="<?php echo e(utf8_encode($row['STT'])); ?>" data-token="<?php echo e(utf8_encode(csrf_token())); ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true" style="padding-left: 10px"></i></a>
                </td>
<<<<<<< HEAD
>>>>>>> master
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
<<<<<<< HEAD




=======
>>>>>>> master
=======
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
>>>>>>> master
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
<<<<<<< HEAD
<<<<<<< HEAD
   </div>
=======
   </div>

   
>>>>>>> master
=======
   </div>

   
>>>>>>> master
