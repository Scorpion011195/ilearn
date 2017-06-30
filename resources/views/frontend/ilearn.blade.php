<!doctype html>
<html lang="en">
@include('frontend.layout.html_header')
@include('frontend.layout.header')
@include('frontend.layout.search')
@include('frontend.layout.footer')
@include('frontend.layout.register')
        <script>
            $( document ).ready(function () {
                $( '#create-dict' ).addClass('collapse');
            });
        </script>
</body>
</html>
