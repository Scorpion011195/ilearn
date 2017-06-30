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
                <div class="col-md-6">
                    <div class="alert alert-info" id='idsuccess'> 
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>              
                    <h2 align="center"><strong>Well done!</strong> You register successfully.</h2>
                    </div>
                    Click here &nbsp; <a href="javascript:void(0);" onclick="loginToAdd()">Đăng nhập</a> &nbsp; to login
            </div>
        @endif

        @if(isset($flag))
            <div class='col-md-3'></div>
                <div class="col-md-6">
                    <div class="alert alert-warning" id='idsuccess'>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>               
                    <h2 align="center">Dữ liệu đang được cập nhật</h2>
                    </div>
                </div>
                
        @endif
</body>
</html>
