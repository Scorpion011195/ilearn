@extends('frontend.layouts.index')
@section('content')
@include('frontend.components.search.search')
	<div class="container">
    <div class="col-xs-12 result">
        <div class = "col-sm-6 col-sm-offset-3 form-group row">
            <div class ="row panel panel-default no-radius-left no-radius-right">
                <div class="col-xs-8 col-sm-6">
                <span class="title">Bản dịch từ:{!!($inputText)!!}</span>
                    @if(isset($workInfo))
                        <?php $type = '' ?>
                        @foreach ($workInfo as $language)
                            <?php $getData ='';?>
                            @if(!($type == $language->type))
                                <?php  $type = $language->type ?> <br>
                                <b class="type" >{!! $language->type !!}</b>:<br>
                                    @if(!Auth::guest())
                                        <span class="glyphicon glyphicon-plus _push-his" id="_id{!! $language->id !!}" data-id="{!! $language->id !!}">{!! $language->listen !!}</span>
                                        <span class="glyphicon glyphicon-volume-up" id="_id{!! $language->id !!}">{!! $language->listen !!}</span>
                                        <span contenteditable> {!! $language ->word !!} </span> &nbsp;<br>
                                    @endif
                                    @if(Auth::guest())
                                        <span>{!! $language->listen !!}</span>
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
                                    <span>{!! $language->listen !!}</span>
                                    <span class="glyphicon glyphicon-volume-up">{!! $language->listen !!}</span>
                                    <span> {!! $language ->word !!} </span> &nbsp;<br>
                                @endif
                            @endif
                        @endforeach
                    @endif
                </div>
                <div class="col-xs-4 col-sm-6">
                    <span class="title">Giải thích từ:{!!($inputText)!!}</span>
                        @if(isset($workInfo))
                            <?php $type = '' ?>
                            @foreach ($workInfo as $language)
                                <?php
                                $getData='';
                                ?>
                                @if(empty($language->explain))

                                @else
                                    @if(!($type == $language->type))
                                        <?php  $type = $language->type ?><br>
                                        <b class="_type" >{!! $language->type !!}</b>:<br>
                                        <span> {!! $language ->explain !!} </span> &nbsp;<br>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                </div>
            </div>
            @if(Auth::guest())
                <div class="right-group">
                    <a href="{{url('dangnhap')}}">Đăng nhập</a> để có thêm nhiều tiện ích
                </div>
            @endif
        </div>
    </div>
</div>
@endsection