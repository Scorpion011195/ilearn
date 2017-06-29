
<div class="container">
    <div class="col-sm-6 col-sm-offset-3 form-group row panel panel-default no-radius-left no-radius-right">
        <div class="panel-footer background-white">
            <form action="{{route('HistoryAddNew')}}" method="POST" role="form">
                @if(isset($workInfo))
                <?php $type = '' ?>
                    @foreach ($workInfo as $language)
                        <?php
                        $getData='';
                        ?>
                        @if(!($type == $language->type))
                            <?php  $type = $language->type ?>
                             <b class="_type" >{!! $language->type !!}</b>:<br>
                             <span class="glyphicon glyphicon-plus _push-his" id="_id{!! $language->id !!}" data-id="{!! $language->id !!}">{!! $language->listen !!}</span>
                             <span class="glyphicon glyphicon-volume-up" id="_id{!! $language->id !!}">{!! $language->listen !!}</span>
                             <span contenteditable> {!! $language ->word !!} </span> &nbsp;<br>
                        @else
                             <span class="glyphicon glyphicon-plus _push-his" id="_id{!! $language->id !!}" data-id="{!! $language->id !!}">{!! $language->listen !!}</span>
                             <span class="glyphicon glyphicon-volume-up" id="_id{!! $language->id !!}">{!! $language->listen !!}</span>
                             <span contenteditable> {!! $language ->word !!} </span> &nbsp;<br>
                        @endif
                    @endforeach

            @if(!Auth::guest())
                <div class="right-group">
                <button type="button" class="btn btn-success">Thêm vào lịch sử</button>
                </div>
            @endif
        </form>
        @endif

<!-- test push history script -->
<script>
        $(document).ready(function() {
            $('._push-his').on('click', function(E){
                var from = $("#_langFrom :selected").text();
                var to = $("#_langTo :selected").text();
                //var id = $(this).attr('data-id');
                var type = $(this)
                var from_text = $('._text-search').val();
                var to_text = $(this).next().next().text();
                alert(from+"-"+to+"-"+from_text+"-"+to_text+"-"+type);

            });
        } );
</script>

        @if(Auth::guest())
        <div class="panel-footer background-white">
            <div class="rigt-group">
                <a href="javascript:void(0);" onclick="loginToAdd()">Đăng nhập</a> để có thêm nhiều tiện ích
            </div>
        </div>
        @endif


    </div>

</div>
</div>
<!-- Modal for edit word : Editer: Trong 10/40/AM/2017/26/06-->
