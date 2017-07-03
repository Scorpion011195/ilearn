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
                                    <b class="_type" >{!! $language->type !!}</b>:<br>
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
                                @endif
                            @endforeach
                        @endif   

                        @if(Auth::guest())
                            <div class="right-group">
                                <a href="javascript:void(0);" onclick="loginToAdd()">Đăng nhập</a> để có thêm nhiều tiện ích
                            </div>
                        @endif

<<<<<<< HEAD
                        @if(!Auth::guest())
                        <div class="right-group">
                            Góp ý và chỉnh sửa <a data-toggle="modal" data-target="#myModal">Tại đây</a>
                        </div>
                        @endif

                        <input type="hidden" name="getData1" value="{!! $language->type !!}">
                        <input type="hidden" name="getData2" value="{!! $language->word !!}">
                        <input type="hidden" name="getData3" value="{!! $language->explain !!}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>                  
                    <!-- test script -->
                    <script>
                        $(document).ready(function() {
                            $('._push-his').on('click', function(E){
                                var from = $("#_langFrom :selected").text();
                                var to = $("#_langTo :selected").text();
                                var id = $(this).attr('data-id');
                                var from_text = $('._text-search').val();
                                var to_text = $(this).next().next().text();
                                alert(from+"-"+to+"-"+from_text+"-"+to_text+"-"+id);

                            });
                        } );
                    </script>
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
=======
                                <input type="hidden" name="getData1" value="{!! $language->type !!}">
                                <input type="hidden" name="getData2" value="{!! $language->word !!}">
                                <input type="hidden" name="getData3" value="{!! $language->explain !!}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                            @endif
                        @endforeach
                    @endif
                <!-- test script -->
                <script>
                    $(document).ready(function() {
                        $('._push-his').on('click', function(E){
                            var from = $("#_langFrom :selected").text();
                            var to = $("#_langTo :selected").text();
                            var id = $(this).attr('data-id');
                            var from_text = $('._text-search').val();
                            var to_text = $(this).next().next().text();
                            alert(from+"-"+to+"-"+from_text+"-"+to_text+"-"+id);
                        });
                    } );
                </script>
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
>>>>>>> c186160a6629627fa1e450157d10a2fcf997ab52
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
<!-- Modal for edit word : Editer: Trong 10/40/AM/2017/26/06-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Chỉnh sửa từ</h4>
    </div>
    <div class="modal-body">
        <form action="{{ route('historyUpdate') }}" method="POST" role="form" id="create-dict-form">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <div class="create-dict-input">
            <div class="row panel">
                <div class="row no-margin margin-top">
                    <div class="col-sm-5">
                        <div class="row">
                            <div class="col-sm-3">
                                <label  class="form-label text-center-vertical">Từ</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{$inputText}}" name="tu">
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-5">
                                <label  class="form-label text-center-vertical">Ngôn ngữ</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="cb1" value="{{$langueInput}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row no-margin margin-top">
                    <div class="col-sm-5">
                        <div class="row">
                            <div class="col-sm-3">
                               <label  class="form-label text-center-vertical">Giải thích</label>
                           </div>
                           <div class="col-sm-9">
                            <input type="text" class="form-control" name="des1">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row no-margin margin-top">
            <div class="col-sm-5">
                <div class="row">
                    <div class="col-sm-3">
                        <label  class="form-label text-center-vertical">Nghĩa</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nghia" value="{{ $language->word}}">
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-5">
                        <label  class="form-label text-center-vertical">Ngôn ngữ</label>
                    </div>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="cb2" value="{{$langueOutput}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row no-margin margin-top">
            <div class="col-sm-5">
                <div class="row">
                    <div class="col-sm-3">
                       <label  class="form-label text-center-vertical">Giải thích</label>
                   </div>
                   <div class="col-sm-9">
                    <input type="text" class="form-control" name="des2">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-center row margin-top">
    {!! Form::submit("Send", ['class' => 'btn btn-success']) !!}
</div>
{!! Form::close() !!}
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>

</div>
</div>
