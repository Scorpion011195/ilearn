<div class="center">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 form-group row">
            <h1 class="text-center">ILEARN</h1>
        </div>
        {!! Form::open(['class' =>'container']) !!}
        <div class="col-sm-6 col-sm-offset-3 form-group row">
            <div class="col-sm-10 no-padding">
                {!! Form::text('search', '', ['class' => 'form-control no-radius-right', 'autofocus']) !!}
            </div>
            {!! Form::submit('Tra từ', ['class' => 'btn btn-success ilearn-background-color col-sm-2 no-radius-left']) !!}
        </div>
        <?php $data = DB::table('languages')->get(); ?>

                <div class="col-sm-6 col-sm-offset-3 form-group row">
                    <div class="col-sm-3 form-inline ">
                        <label for="sel1">Nguồn:</label>
                        <select name="cb1" class="form-control ilearn-margin-right" id="sel1">
                               <?php foreach($data as $item){
                                $language = $item->language;
                                ?>
                            <option value="{{$item->language}}">{{ $language }}</option>
                            <?php }?>
                        </select> 
                    </div>
                    <div class="col-sm-3 form-inline ">
                        <label for="sel1"> Đích:</label>
                        <select name="cb2" class="form-control ilearn-margin-right" id="sel1">
                               <?php foreach($data as $item){
                                $language = $item->language;
                                ?>
                                <option value="{{$item->language}}">{{ $language }}</option>
                            <?php }?>
                        </select> 
                    </div>
                </div>
        

        <div class="result">
          @if(!isset($arraySaveView))
    
    <div class="container">
    <div class="col-sm-6 col-sm-offset-3 form-group row panel panel-default no-radius-left no-radius-right">
        <div class="panel-body">

        </div>
        <div class="panel-footer background-white">
                
                 
                
                <textarea class="form-control" rows="5" id="comment">
                <?php    
                foreach ($workInfo as $language){
                {{$language->type}} : {{ $language ->word }} &nbsp;
                Explain:{{ $language->explain}} 
            }
                </textarea>
                 ?>
                @if(Auth::guest()) 
                <div class="panel-footer background-white">
                    <div class="rigt-group">
                        <a href="javascript:void(0);" onclick="loginToAdd()">Đăng nhập</a> để có thêm nhiều tiện ích
                    </div>
                </div>
                @endif

            @if(!Auth::guest())
                <div class="right-group">
                    <a href="{{route('getData')}}"><button class="btn btn-primary">Thêm từ mới</button></a>
               </div>
            @endif
        </div>
    </div>
</div> 

@endif
        {!! Form::close() !!}
        </div>

        <div class="create-dict">
            @include('frontend.layout.create-dict')
        </div>

        
    </div>

</div>
