{!! Form::open(array('route' => 'search')) !!}
<div class="center textXXX">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 form-group row">
            <h1 class="text-center">ILEARN</h1>
        </div>
        
       
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
        {!! Form::close() !!}
        <div class="result">
            @include('frontend.layout.ketqua')
        </div>

        @if(isset($flash))
            <div class='col-md-3'></div>
            <div class="col-md-6" id='idsuccess'>               
                <h2>Chuc mung ban dang ki thanh cong</h2>
            </div>
        @endif

        <div class="create-dict">
            @include('frontend.layout.create-dict')
        </div>
    </div>

</div>