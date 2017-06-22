
<div class="container">
    <div class="col-sm-6 col-sm-offset-3 form-group row panel panel-default no-radius-left no-radius-right">
        <div class="panel-body">

        </div>
        <div class="panel-footer background-white">
                @if(isset($workInfo))
                
                     @foreach ($workInfo as $language)

                         <b>{{$language->type}}</b>:{{ $language ->word }} &nbsp;                     
                        <span class="glyphicon glyphicon-volume-up">{{$language->listen}}
                        </span><br>
                        Explain:{{ $language->explain}}
                        <hr>
                    @endforeach
                @endif
                @if(Auth::guest()) 
                <div class="panel-footer background-white">
                    <div class="rigt-group">
                        <a href="javascript:void(0);" onclick="loginToAdd()">Đăng nhập</a> để có thêm nhiều tiện ích
                    </div>
                </div>
                @endif

            @if(!Auth::guest())
                <div class="right-group">
                    <button class="btn btn-success">Đẩy vào thông báo</button>
                    <button class="btn btn-primary" data-toggle="collapse" data-target="#create-dict">Thêm từ mới</button>
               </div>
            @endif
        </div>
    </div>
</div> 