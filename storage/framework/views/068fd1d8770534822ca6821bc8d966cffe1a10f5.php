<div class="container panel text-center">
    <div class="panel-body">
        <?php echo Form::open(['id' => 'notification-settings-form']); ?>

        <div class="container col-sm-6 col-sm-offset-3">
            <div class="row">
                <?php echo Form::label('notification-settings-time', 'Thời gian nhắc từ', ['class' => 'control-label col-sm-4 text-center-vertical']); ?>

                <div class="col-sm-8">
                    <?php echo Form::select('notification-settings-time', ['1' => '14 phút', '2' => '1 giờ'], '',['class' => 'form-control']); ?>

                </div>
            </div>

            <div class="row">
                <?php echo Form::label('notification-settings-display', 'Hiển thị', ['class' => 'control-label col-sm-4 text-center-vertical']); ?>

                <div class="col-sm-8 form-check margin-top">
                    <div class="form-group has-success text-left">
                        <label class="custom-control custom-checkbox text-left">
                            <?php echo Form::checkbox('1', 'Từ', '',['class' => 'custom-control-input']); ?>

                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Từ</span>
                        </label>
                    </div>
                    <div class="form-group has-success text-left">
                        <label class="custom-control custom-checkbox text-left">
                            <?php echo Form::checkbox('1', 'Từ', '',['class' => 'custom-control-input']); ?>

                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Nghĩa</span>
                        </label>
                    </div>
                    <div class="form-group has-success text-left">
                        <label class="custom-control custom-checkbox text-left">
                            <?php echo Form::checkbox('1', 'Từ', '',['class' => 'custom-control-input']); ?>

                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Giải thích</span>
                        </label>
                    </div>
                </div>
            </div>
            <div>
                <?php echo Form::submit('Cài đặt', ['class' => 'btn btn-success']); ?>

            </div>
        </div>
        <?php echo Form::close(); ?>

    </div>
</div>