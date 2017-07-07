
@if(isset($index))
    <div class="row margin-top create-dict-meaning-group" id="{!! $index !!}">
        <div class="row no-margin margin-top">
            <div class="col-sm-5">
                <div class="row">
                    <div class="col-sm-3">
                        {!! Form::label("create-dict-phrase-".$index, 'Nghĩa',['class' => 'form-label text-center-vertical']) !!}
                    </div>
                    <div class="col-sm-9">
                        {!! Form::text("create-dict-phrase-".$index, '', ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-5">
                        {!! Form::label("create-dict-meaning-".$index, 'Ngôn ngữ',['class' => 'form-label text-center-vertical']) !!}
                    </div>
                    <div class="col-sm-7">
                        {!! Form::select("create-dict-meaning-".$index, ['1' => 'Anh', '2' => 'Viet'], '',['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="col-sm-1">
                <button class="btn btn-white create-dict-add"><i class="fa fa-plus-circle fa-lg " aria-hidden="true"></i></button>
                <button class="btn btn-white create-dict-remove hidden"><i class="fa fa-times fa-lg " aria-hidden="true"></i></button>
            </div>
        </div>

        <div class="row no-margin margin-top">
            <div class="col-sm-5">
                <div class="row">
                    <div class="col-sm-3">
                        {!! Form::label('create-dict-explain', 'Giải thích',['class' => 'form-label text-center-vertical']) !!}
                    </div>
                    <div class="col-sm-9">
                        {!! Form::text('create-dict-explain', '', ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif