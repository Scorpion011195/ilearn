@extends('backend.ilearn')

@section('css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"
          rel="stylesheet"/>
    <!-- X EDITABLE CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
          rel="stylesheet"/>
@endsection

@section('content-header')
        <h1>
            Thống kê
            <!-- <small>{{ Session::get('user')->username }}</small> -->
        </h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol> -->
@endsection

@section('content')
    <div class="panel">
        <div class="panel-body">
            <div class="row">
              <div class="col-sm-12">
                <form class="form-inline" action="{{ route('adminDictCollectByCondition') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                      <label>Tình trạng</label>
                      <select class="form-control" name="_condition">
                          @foreach($listSearch as $value)
                          <option
                              @if($value == $cbTypeWord)
                                  {!! "selected" !!}
                              @endif
                          >{!! $value !!}</option>
                          @endforeach
                      </select>
                      <button type="submit" class="btn btn-info">
                          <span class="glyphicon glyphicon-search"></span>
                      </button>
                    </div>
                </form>
              </div>
            </div>
            <br>
            @include('backend.layout.partial.collect-table')
        </div>
    </div>
@endsection

@section('script')
<!--     X-EDITABLE JS
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $.fn.editable.defaults.mode = 'inline';
        $(document).ready(function() {
            $('._edit-me').editable();
        });
        $('#username').editable({
            type: 'text',
            pk: 1,
            url: '/post',
            title: 'Enter username'
        });
        var table = $('#example').DataTable();

        $('#example tbody').on('click', 'tr', function () {
            var data = table.row( this ).data();
            alert( 'You clicked on '+data[0]+'\'s row' );
        } );

        $(function() {
            $( "#collect-date" ).datepicker();
        });
    } );
</script>
 -->
    <!-- Active left menu -->
    <script>
        $(document).ready(function(){
            $('#_menu-qltd').addClass("active");
            $('#_menu-qltd-tk').addClass("active");
        });
    </script>
    <!-- /.Active left menu -->

    <!-- script toltip -->
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <!-- /.script tootip -->
@endsection
