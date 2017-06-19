<!doctype html>
<html lang="en">

@include('frontend.layout.html_header')
<link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"
      rel="stylesheet"/>
<!-- X EDITABLE CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
      rel="stylesheet"/>
<!-- X-EDITABLE JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
@include('frontend.layout.header')
<section class="container margin-top margin-footer">
    <div class="">
        <div class="panel-content">
            @include('frontend.layout.create-dict')
        </div>
        <div class=" text-center">
            @include('frontend.layout.partial.settings-table')
        </div>
    </div>
</section>
@include('frontend.layout.footer')
@include('frontend.layout.footer-script')
@include('frontend.layout.register')
<!-- SET UP EDITABLE -->
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
</body>
</html>