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

<!--  Confirm delete word to -->
<script>
$(document).ready(function(){
    $("a._delete-word-to").on('click', function(E){
        var _element = $(this);
        var idWord = $(this).closest('tr').find('._word-id').attr('data-id');
        var word = $(this).closest('tr').find('._word').text();
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
                    if(response['data'] == "OK"){
                        _element.closest('tr').remove();
                        document.getElementById("_notify").innerHTML = 'Đã xóa từ "'+ word +'"';
                    }
                },
                error: function(xhr, error) {
                   console.log(error);
                }
            });
        }
    });
});
</script>
<!--  /.Confirm delete word to -->

<!--  Update explain -->
<!-- SET MODAL -->
<script>
$(document).ready(function(){
    $("._update-word").on('click', function(E){
        var _element = $(this);
        var idWord = $(this).closest('tr').find('._word-id').attr('data-id');
        var word = $(this).closest('tr').find('._word').text();
        var explain = $(this).closest('tr').find('._explain').html();
        var _token = $('input[name=_token]').val();
        var table = $("#_table-dich :selected").text();

        $('#_nghia').val(word);
        $('#_table-modal').val(table);
        $('#_id-word-modal').val(idWord);
        CKEDITOR.instances['_gtTo'].setData(explain);
    });
});
</script>

<!-- UPDATE -->
<script>
$(document).ready(function(){
    $("#_form-update-word").on('submit', function(E){
        event.preventDefault();
        if($('#_nghia').val() == ''){
            alert('Bạn chưa nhập nghĩa!');
        }
        else{
          var idWord = $('#_id-word-modal').val();

          $.ajax({
            url:'update',
            method: 'POST',
            data : $("#_form-update-word").serialize(),
            dataType:'json',
            success : function(response){
              //$("#_td-word37").val(response['word']);
              //$("#_td-explain"+idWord).val(response['explain']);
              alert("Cap nhat thanh cong");
            },
            error: function(xhr, error) {
               console.log(error);
            }
          });
        }
    });
});
</script>

<!--  /.Update explain -->
@endsection
