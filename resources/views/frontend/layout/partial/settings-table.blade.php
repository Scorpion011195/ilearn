<?php $data = DB::table('historys')->get(); ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Danh sách từ</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-sm-6">
                    <div class="dataTables_length" id="example1_length">
                        <label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                            <?php foreach($data as $item){
                                $stt = $item->id_history;
                                ?>
                                <option>{{ $stt }}</option>
                                <?php }?>
                            </select>
                        </select> entries</label></div>
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
                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                    aria-describedby="example1_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                            style="width: 168px;"> Từ
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="Browser: activate to sort column ascending" style="width: 207px;">Ngôn ngữ
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-label="Platform(s): activate to sort column ascending" style="width: 184px;">
                    Giải thích
                </th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                aria-label="Engine version: activate to sort column ascending" style="width: 143px;">
               Nghĩa
            </th>
            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
            aria-label="CSS grade: activate to sort column ascending" style="width: 103px;">Ngôn ngữ
        </th>
        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
            aria-label="CSS grade: activate to sort column ascending" style="width: 103px;">Giải thích
        </th>
    </thead>
    <tbody>
        <?php
        $stt = $item->content;
        $tt=json_decode($stt);
        ?>
        <tr role="row" class="even">
            <?php
            foreach ($tt as $value) {
                ?>
                <td> {{ $value}}</td>
                <?php     
            }
            ?>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th rowspan="1" colspan="1">Từ</th>
            <th rowspan="1" colspan="1">Ngôn ngữ</th>
            <th rowspan="1" colspan="1">Giải thích</th>
            <th rowspan="1" colspan="1">Nghĩa</th>
            <th rowspan="1" colspan="1">Ngôn ngữ</th>
            <th rowspan="1" colspan="1">Giải thích</th>
        </tr>
    </tfoot>
</table>
</div>
</div>
<div class="row">
    <div class="col-sm-5">
        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of
            57 entries
        </div>
    </div>
    <div class="col-sm-7">
        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
            <ul class="pagination">
                <li class="paginate_button previous disabled" id="example1_previous"><a href="#"
                    aria-controls="example1"
                    data-dt-idx="0"
                    tabindex="0">Previous</a>
                </li>
                <li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1"
                  tabindex="0">1</a></li>
                  <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2"
                    tabindex="0">2</a></li>
                    <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3"
                        tabindex="0">3</a></li>
                        <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4"
                            tabindex="0">4</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5"
                                tabindex="0">5</a></li>
                                <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="6"
                                    tabindex="0">6</a></li>
                                    <li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1"
                                       data-dt-idx="7" tabindex="0">Next</a>
                                   </li>
                               </ul>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <!-- /.box-body -->
       </div>