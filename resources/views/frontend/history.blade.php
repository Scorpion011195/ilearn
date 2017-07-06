<!doctype html>
<html lang="en">

@include('frontend.layout.html_header')
<body>
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
<!-- <script>
    
</script> -->
</body>
</html>