@yield('css')
<link href="{!! asset('css/result.css') !!}" rel="stylesheet">
<div class="container">
    <div class="col-xs-12 result">
        <div class = "col-sm-6 col-sm-offset-3 form-group row">
            <div class ="row panel panel-default no-radius-left no-radius-right">
                <div class="col-xs-8 col-sm-6">
                    <span class="title">Bản dịch từ:{!! ucfirst($inputText) !!}</span>
                    <form action="{{route('HistoryAddNew')}}" method="POST" role="form">
                        @if(isset($workInfo))
                        <?php $type = '' ?>
                        @foreach ($workInfo as $language)
                        <?php $getData ='';?>
                        @if(!($type == $language->type))
                        <?php  $type = $language->type ?>
                        <b class="_type" id="type">{!! $language->type !!}</b>:<br>
                        @if(!Auth::guest())
                        <span class="glyphicon glyphicon-plus _push-his" id="_id{!! $language->id !!}" data="{!! $language->id !!}">{!! $language->listen !!}</span>
                        <span class="glyphicon glyphicon-volume-up" id="_id{!! $language->id !!}">{!! $language->listen !!}</span>
                        <span contenteditable> {!! $language ->word !!} </span> &nbsp;<br>
                        @endif
                        @if(Auth::guest())
                        <span class="glyphicon glyphicon-plus">{!! $language->listen !!}</span>
                        <span class="glyphicon glyphicon-volume-up">{!! $language->listen !!}</span>
                        <span> {!! $language ->word !!} </span> &nbsp;<br>
                        @endif
                        @else

                        @if(!Auth::guest())
                        <span class="glyphicon glyphicon-plus _push-his" id="_id{!! $language->id !!}" data-id="{!! $language->id !!}">{!! $language->listen !!}</span>
                        <span class="glyphicon glyphicon-volume-up" id="_id{!! $language->id !!}">{!! $language->listen !!}</span>
                        <span contenteditable> {!! $language ->word !!} </span> &nbsp;<br>
                        @endif
                        @if(Auth::guest())
                        <span class="glyphicon glyphicon-plus">{!! $language->listen !!}</span>
                        <span class="glyphicon glyphicon-volume-up">{!! $language->listen !!}</span>
                        <span> {!! $language ->word !!} </span> &nbsp;<br>
                        @endif
                        @if(Auth::guest())
                        <div class="right-group">
                            <a href="javascript:void(0);" onclick="loginToAdd()">Đăng nhập</a> để có thêm nhiều tiện ích
                        </div>
                        @endif

                        @if(!Auth::guest())
                        <div class="right-group">
                            <h5 style="float: right;"><b style="color: red;"><i class="fa fa-sticky-note" aria-hidden="true"></i> NOTE:</b>Nhấn vào từ để chỉnh sửa</h5>
                        </div>
                        @endif
                    </form>
                    @endif
                    @endforeach
                    @endif
                </div>
                <div class="col-xs-4 col-sm-6">
                    <span class="title">Giải thích từ:{!! ucfirst($inputText) !!}</span>
                    @if(isset($workInfo))
                    <?php $type = '' ?>
                    @foreach ($workInfo as $language)
                    <?php
                    $getData='';
                    ?>
                    @if(is_null($language->explain))
                    @else
                    @if(!($type == $language->type))
                    <?php  $type = $language->type ?><br>
                    <b class="_type" >{!! $language->type !!}</b>:<br>
                    <span> {!! $language ->explain !!} </span> &nbsp;<br>
                    @else
                    <span> {!! $language ->explain !!} </span> &nbsp;<br>
                    @endif
                    @endif
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

