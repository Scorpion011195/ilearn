@extends('backend.ilearn')

@section('css')
    <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"
          rel="stylesheet"/>
    <!-- X EDITABLE CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
          rel="stylesheet"/>
@endsection

@section('content-header')
        <h1>
            Duyệt từ
            <!-- <small>{{ Session::get('user')->username }}</small> -->
        </h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol> -->
@endsection

@section('content')
    @include('backend.layout.partial.dict-table')
@endsection

@section('script')
    <!-- X-EDITABLE JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $.fn.editable.defaults.mode = 'inline';
            $(document).ready(function() {
                $(' td ').editable();
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
        } );
    </script>

    <!-- Active left menu -->
    <script>
        $(document).ready(function(){
            $('#_menu-qltd').addClass("active");
            $('#_menu-qltd-dt').addClass("active");
        });
    </script>
    <!-- /.Active left menu -->
@endsection
