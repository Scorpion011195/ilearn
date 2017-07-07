
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Danh sách từ</h3>
    </div>
    <?php if(isset($SSMessageDuration)): ?>

             <center><?php echo e(utf8_encode($SSMessageDuration)); ?></center>
         </div>
<?php endif; ?>
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
                            <?php if(isset($data)): ?>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="_from text-center"><?php echo $row['from_text']; ?></td>
                                <td class="_to text-center"><?php echo $row['to_text']; ?> </td>
                                <td class="type_to text-center"><?php echo $row['type_to']; ?> </td>
                                <td class="text-center"><?php echo $row['from']; ?>-<?php echo $row['to']; ?></td>
                                <?php if($row['notification'] == 'T'): ?>
                                <td class="text-center"><input type="checkbox" name="notification" class="action" checked></td>
                                <?php else: ?>
                                <td class="text-center"><input type="checkbox" name="notification" class="action"></td>
                                <?php endif; ?>

                                <td class="text-center">
                                    <span>
                                        <a class="deleteRecord" data-id="<?php echo $row['to_text']; ?>" value="<?php echo $row['from_text']; ?>" data-toggle="tooltip" data-placement="left" title="Xóa!"><i class=" fa fa-trash-o fa-1x" aria-hidden="true"  "></i></a>
                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>

                    </table>


                </div>
            </div>
