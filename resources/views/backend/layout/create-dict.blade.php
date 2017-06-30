<div id="create-dict"  class="container">
    <div class="col-sm-6 col-sm-offset-3 form-group row panel panel-default no-radius-left no-radius-right">
        <div class="panel-body">
            {!! Form::open(['id' => 'create-dict-form']) !!}
            <div class="create-dict-input">
                <div class="row panel">
                    <div class="row no-margin margin-top">
                        <div class="col-sm-5">
                            <div class="row">
                                <div class="col-sm-3">
                                    {!! Form::label('create-dict-phrase', 'Từ',['class' => 'form-label text-center-vertical']) !!}
                                </div>
                                <div class="col-sm-9">
                                    {!! Form::text('create-dict-phrase', '', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-5">
                                    {!! Form::label('create-dict-phrase', 'Ngôn ngữ',['class' => 'form-label text-center-vertical']) !!}
                                </div>
                                <div class="col-sm-7">
                                    {!! Form::select('create-dict-phrase', ['1' => 'Anh', '2' => 'Viet'], '',['class' => 'form-control']) !!}
                                </div>
                            </div>
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
                <div class="row margin-top panel">
                    <div class="row no-margin">
                        <div class="col-sm-5">
                            <div class="row">
                                <div class="col-sm-3">
                                    {!! Form::label('create-dict-phrase', 'Nghĩa',['class' => 'form-label text-center-vertical']) !!}
                                </div>
                                <div class="col-sm-9">
                                    {!! Form::text('create-dict-phrase', '', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-5">
                                    {!! Form::label('create-dict-meaning', 'Ngôn ngữ',['class' => 'form-label text-center-vertical']) !!}
                                </div>
                                <div class="col-sm-7">
                                    {!! Form::select('create-dict-meaning', ['1' => 'Anh', '2' => 'Viet'], '',['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-white create-dict-add"><i class="fa fa-plus-circle fa-lg " aria-hidden="true"></i></button>
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
            </div>
            <div class="text-center row margin-top">
                {!! Form::submit("Thêm từ", ['class' => 'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
