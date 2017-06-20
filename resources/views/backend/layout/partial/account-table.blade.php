<div class="box">
    <div class="box-header">
        <h3 class="box-title">Danh sách tài khoản</h3>
    </div>
    <!-- /.box-header -->
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
                        aria-label="Browser: activate to sort column ascending" style="width: 207px;">Tài khoản
                            </th>
                            <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-label="Platform(s): activate to sort column ascending" style="width: 100px;">
                    Tình trạng
                            </th>
                            <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                aria-label="Engine version: activate to sort column ascending" style="width: 100px;">
                Quyền
                            </th>
                            <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
            aria-label="CSS grade: activate to sort column ascending" style="width: 103px;">Ngày đăng ký
                            </th>
                            <th class="text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
        aria-label="CSS grade: activate to sort column ascending" style="width: 103px;">Hành động
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    function changeColor($str, $key)
                    {
                        return str_replace($key, "<span style='color:red;'>$key</span>", $str);
                    }

                    ?>

                        @foreach($accounts as $ac)
                        <?php $_idUser = $ac->id_user; ?>
                        <tr role="row" class="odd">
                            <td class="_user-id sorting_1 text-center" data-id="{{ $_idUser }}">{{ $_idUser }}</td>
                            <td class="sorting_1 text-center">{!! changeColor($ac->username, $key_username) !!}</td>
                            <td class="sorting_1 text-center">
                            <!-- comboBox status -->
                                    <select class="selectpicker choose-status">
                                        @foreach($listStatus as $ls)
                                          <option
                                              @if($ac->id_status == $ls->id_status)
                                                  {{ "selected" }}
                                              @endif
                                              value="{{ $ls->id_status }}">{{ $ls->status }}
                                          </option>
                                        @endforeach
                                    </select>
                             <!-- /.comboBox status -->
                            </td>
                            <td class="sorting_1 text-center">
                            <!-- comboBox role -->
                                    <select class="selectpicker choose-role">
                                        @foreach($listRoles as $lr)
                                          <option
                                              @if($ac->id_role == $lr->id_role)
                                                  {{ "selected" }}
                                              @endif
                                              value="{{ $lr->id_role }}">{{ $lr->role }}
                                          </option>
                                        @endforeach
                                    </select>
                             <!-- /.comboBox role -->
                            </td>
                            <td class="sorting_1 text-center">{!! changeColor(date('Y-m-d', strtotime($ac->created_at)), $key_day) !!}</td>
                            <td class="sorting_1 text-center">
                                <a class="_delete-user" data-toggle="tooltip" title="Xóa!">
                                  <span class="glyphicon glyphicon-remove"></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>

                    </table>
                </div>
            </div>

        <div class="row">
            <div class="col-sm-5">
                <!-- <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Hiển thị {{ $noOfPages }} của {{ $noOfAccounts }} tài khoản -->
                <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Tổng cộng có {{ $noOfAccounts }} tài khoản
                </div>
            </div>
            <div class="col-sm-7"></div>
        </div>
    </div>
</div>
                    {!! $accounts->links() !!}

