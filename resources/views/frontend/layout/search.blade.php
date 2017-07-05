@yield('css')
<link href="{{asset('css/search.css') }}" rel="stylesheet">
<div class="row">
    <div class="col-sm-6 col-sm-offset-3 form-group row">
        <h1 class="text-center">ILEARN</h1>
    </div>
    {!! Form::open(array('route' => 'search','method' => 'get', 'class' =>'container')) !!}
    <div class="col-sm-6 col-sm-offset-3 form-group row">
        <div class="col-sm-10 no-padding">
            {!! Form::text('search', '', ['id' => 'from','class' => 'form-control no-radius-right', 'autofocus', 'maxlength' => 50]) !!}
        </div>
        {!! Form::submit('Tra từ', ['class' => 'btn btn-success ilearn-background-color col-sm-2 no-radius-left']) !!}
        <div class="error-form">
            @if ($errors->any())
                <div class="alert alert-danger">
                    {!! $errors->first('search') !!}
                </div>
            @endif
        </div>
    </div>
    <div class="col-sm-6 col-sm-offset-3 form-group row ">
        <div class="col-sm-3 col-sm-offset-3 ">
            <label for="sel1">Nguồn:</label>
            <select name="lagFrom" class="form-control" id="sel1">
             <?php foreach($data as $item =>$value){
                $language = $value->language;
                ?>
                @if (\Session::get('flagLanguage1') == $language)
                <option value="{!! $language !!}" selected>{!! $language !!}</option>
                @else
                <option value="{!! $language !!}">{!! $language !!}</option>
                @endif
                <?php }?>
            </select>
        </div>

        <div class="col-sm-3 col-sm-offset-0 ">
            <label for="sel1"> Đích:</label>
            <select name="lagTo" class="form-control" id="sel2">
             <?php foreach($data as $item =>$value){
                $language = $value->language;
                ?>
                @if (\Session::get('flagLanguage2') == $language)
                <option value="{!! $language !!}" selected>{!! $language !!}</option>
                @else
                <option value="{!! $language !!}">{!! $language !!}</option>
                @endif
                <?php }?>
            </select>
                    </div>
    </div>
    {!! Form::close() !!}
</div>
<br>
<div class="result">
@include('frontend.layout.result')
</div>

<div class="create-dict">
@include('frontend.layout.create-dict')
</div>
</div>

</div>


