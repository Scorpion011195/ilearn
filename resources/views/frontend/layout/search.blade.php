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
        <div class="col-sm-6 col-sm-offset-3 form-group row">
            <div class="col-sm-3 col-sm-offset-3 no-padding form-inline ">
                {!! Form::label('source', 'Nguồn') !!}
                {!! Form::select('source', ['1' => 'Anh', '2' => 'Việt'], '', ['class' => 'form-control ilearn-margin-right']) !!}
            </div>
            <div class="col-sm-3 no-padding form-inline">
                {!! Form::label('dest', 'Đích') !!}
                {!! Form::select('dest', ['1' => 'Anh', '2' => 'Việt'], '', ['class' => 'form-control ilearn-margin-right']) !!}
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