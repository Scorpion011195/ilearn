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
            Tra từ
            <!-- <small>{{ Session::get('user')->username }}</small> -->
        </h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol> -->
@endsection

@section('content')
    @include('backend.layout.partial.search-table')
@endsection

@section('script')
<!-- Active left menu -->
<script>
    $(document).ready(function(){
        $('#_menu-qltd').addClass("active");
        $('#_menu-qltd-trt').addClass("active");
    });
</script>
<!-- /.Active left menu -->

    <!-- Confirm delete word to -->
    <script>
        $(document).ready(function(){
            $("a._delete-word-to").on('click', function(E){
                var _element = $(this);
                var idWord = $(this).closest('tr').find('._word-id').attr('data-id');
                var _token = $('input[name=_token]').val();
                var table = $("#_table-dich :selected").text();

                if(!confirm('Bạn có muốn xóa từ này?')){
                    e.preventDefault();
                    return false;
                }
                else{
                    $.ajax({
                        url:'delete',
                        method: 'POST',
                        data : {'idWord': idWord,'table': table, '_token' : _token},
                        dataType:'json',
                        success : function(response){
                                _element.closest('tr').remove();
                        },
                        error: function(xhr, error) {
                           console.log(error);
                        }
                    });
                }
            });
        });
    </script>
    <!-- /.Confirm delete word to -->
@endsection
