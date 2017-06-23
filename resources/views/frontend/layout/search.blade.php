<div class="center">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 form-group row">
            <h1 class="text-center">ILEARN</h1>
        </div>
        {{ Form::open(array('route' => 'search', 'class' =>'container')) }}
        <div class="col-sm-6 col-sm-offset-3 form-group row">
            <div class="col-sm-10 no-padding">
                {!! Form::text('search', '', ['class' => 'form-control no-radius-right', 'autofocus']) !!}
            </div>
            {!! Form::submit('Tra từ', ['class' => 'btn btn-success ilearn-background-color col-sm-2 no-radius-left']) !!}
        </div>
        

                <div class="col-sm-6 col-sm-offset-3 form-group row">
                    <div class="col-sm-3 form-inline ">
                        <label for="sel1">Nguồn:</label>
                        <select name="cb1" class="form-control ilearn-margin-right" id="sel1">
                               <?php foreach($data as $item =>$value){
                                $language = $value->language;
                                ?>               
                            @if (Session::get('flagLanguage1') == $language)
                                <option value="{{ $language }}" selected>{{ $language }}</option>
                                    @else
                                          <option value="{{ $language }}">{{ $language }}</option>
                                    @endif
                             <?php }?>                             
                         </select> 
                    </div>
                    <div class="col-sm-3 form-inline ">
                        <label for="sel1"> Đích:</label>
                        <select name="cb2" class="form-control ilearn-margin-right" id="sel1">
                               <?php foreach($data as $item =>$value){
                                $language = $value->language;
                                ?>               
                            @if (\Session::get('flagLanguage2') == $language)
                                <option value="{{ $language }}" selected>{{ $language }}</option>
                                    @else
                                          <option value="{{ $language }}">{{ $language }}</option>
                                    @endif
                             <?php }?>                             
                         </select>
                    </div>
                </div>
        {!! Form::close() !!}

        <div class="result">
            @include('frontend.layout.result')
        </div>

        <div class="create-dict">
            @include('frontend.layout.create-dict')
        </div>

        
    </div>

</div>