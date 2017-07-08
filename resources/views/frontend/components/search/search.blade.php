<div class="row">
    <div class="col-sm-6 col-sm-offset-3 form-group row">
        <h1 class="text-center">ILEARN</h1>
    </div>
    {!! Form::open(array('route' => 'search','method' => 'get', 'class' =>'container')) !!}
    <div class="row">
        <div class="col-md-3"></div>
            <div class="col-md-6 ">
        <div class="col-sm-10 no-padding">
            {!! Form::text('search', '', ['id' => 'from','class' => 'form-control no-radius-right', 'autofocus', 'required', 'maxlength' => 50]) !!}
        </div>
            {!! Form::submit('Tra từ', ['class' => 'btn btn-warning ilearn-background-color col-sm-2 no-radius-left']) !!}
        <div class="error-form">
            @if ($errors->has('search'))
                 <p class="alert--fail"><span class="glyphicon glyphicon-warning-sign"></span>
                    {!! $errors->first('search') !!}
                </p>
            @endif
        </div>
        <div class="col-md-3"></div>
    </div>
    </div>

    <div class="form-inline margin--top-5-px text-center">
        <div class="input-group ">
            <span for="sel1" class="input-group-addon">Nguồn</span>
            <select class="form-control" name="lagFrom" id="sel1">
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
            <div class="input-group">
                <span for="sel2" class="input-group-addon">Đích</span>
                <select name="lagTo" class="form-control" id="sel2" selected="vietnamese">
                   <?php foreach($data as $item =>$value){
                    $language = $value->language;
                    ?>
                    @if (\Session::get('flagLanguage2') == $language)
                    <option value="{!! $language !!}" selected >{!! $language !!}</option>
                    @else
                    <option value="{!! $language !!}">{!! $language !!}</option>
                    @endif
                    <?php }?>
                </select>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>


