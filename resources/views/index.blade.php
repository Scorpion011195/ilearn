<!doctype html>
<html lang="en">
@include('frontend.layout.html_header')
@include('frontend.layout.header')
@include('frontend.layout.timkiem')
@include('frontend.layout.footer')
@include('frontend.layout.register')
        <script>
            $( document ).ready(function () {
                $( '#create-dict' ).addClass('collapse');
            });
        </script>
        
        @if(isset($flash))
            <div class='col-md-3'></div>
            <div class="col-md-6" id='idsuccess'>               
                <h2>Chuc mung ban dang ki thanh cong</h2>
            </div>
        @endif
</body>
</html>