
<html lang="en">

@include('frontend.components.html_header')
<body>
@include('frontend.components.header')
<section class="container margin-top margin-footer">
    <div class="">
        <div class="panel-content">
            @include('frontend.components.partial.create-dict')
        </div>
        <div class=" text-center">
            @include('frontend.layout.partial.settings-table')
        </div>
    </div>
</section>
@include('frontend.components.footer')
@include('frontend.components.footer-script')
<!-- SET UP EDITABLE -->
<!-- <script>
    
</script> -->
</body>
</html>